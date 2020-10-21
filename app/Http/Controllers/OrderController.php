<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Service;
use App\OrderReply;
use App\User;
use App\ServiceRate;
use App\OrderIssue;
use App\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class OrderController extends Controller
{

    public function __construct(){
        $settings = \App\Setting::find(1);
        \View::share('settings', $settings);
    }



    public function create(Request $request){

        $serviceID = $request->id;


        if( ! $request->message ){
            return \redirect()->back()->with('error', 'قم بكتابة رسالتك للبائع');
        }
        
        if( ! $request->quantity ){
            return \redirect()->back()->with('error', 'قم بكتابة الكمية المطلوب شرائها');
        }

        
        // check service existance
        $service = Service::find($serviceID);
        
        if( $request->quantity > $service->quantity ){
            return \redirect()->back()->with('error', 'الكمية المطلوبة أكبر من المتاح');
        }

        if( $service->user_id == auth()->user()->id ){
            return \redirect()->back()->with('error', 'لا يمكنك شراء الخدمة الخاصة بك');
        }

        $order = Order::create([

            'user_id' => auth()->user()->id,
            'service_id' => $service->id,
            'message' => $request->message,
            'quantity' => $request->quantity,
            'price_desc' => $service->price_desc,
            'label' => $service->label,
            'main_category' => $service->main_category,
            'sub_category' => $service->sub_category,
            
        ]);

        if(! $order ){
            return \redirect()->back()->with('error', 'فشلت العملية حاول مجددا');
        }


        $service->quantity = $service->quantity - $request->quantity;
        $service->save();

        $service_user_id = $service->user_id;
        $user = \App\User::find($service_user_id);

        $data = array(
            'name' => $user->name,
            'message' => "تهانينا! لقد تم تقدبم طلب لشراء خدمتك. الرجاء الذهاب للموقع لاتمام العملية.",
            'link' =>url("/orders/".$order->id),
            'email' => $user->email,
        );


        Mail::to($user->email)->send( new SendMail($data,"لديك طلب جديد",'mail.service_approve'));

        $notification = ' <div style="">طلب جديد</div> <div style="margin-top: 15px;" class="text-center"><a href="/orders/'.$order->id.'">إضغط هنا لتصفح الطلب</a></div>';
        $delete_token = \Str::random(20);
        $data=[];
        $data[] = array(
            'user_id'      => $service->user_id, 
            'content'      => $notification, 
            'language'     => 'AR',
            'delete_token' => $delete_token,
            "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
        );


        $create_notification = Notification::insert($data);


        return \redirect('/orders/'.$order->id,)->with('success', 'تم فتح طلب جديد');


    }/* /create() */



    public function viewOrder(Request $request){

        $order = Order::find($request->id);
        $service = Service::find($order->service_id);
        $replies = OrderReply::where('order_id', $order->id)->get();
        $seller = User::find($service->user_id);

        return view('order', \compact('order', 'service', 'replies', 'seller'));

    }/* /viewOrder() */






    public function addReply(Request $request){
        
        $orderID = $request->id;
        $reply = $request->reply;

        $order = Order::find($orderID);
        $service = Service::find($order->service_id);
        

        if( ! $reply and !$request->file('image') ){
            return response()->json([
                'error' => 1,
                'message' => 'قم بإضافة تعليق أو صورة',
            ]);
        }

        
        if( ! $reply and $request->file('image') ){
            $reply = " ";
        }


        $reply = OrderReply::create([
            'user_id' => auth()->user()->id,
            'order_id' => $orderID,
            'message' => $reply,    
        ]);


        if( ! $reply ){
            return response()->json([
                'error' => 1,
                'message' => 'قم بكتابة التعليق من فضلك',
            ]);
        }

        $replyImage = '';

        if( $request->file('image') ){
            $reply->addMediaFromRequest('image')->toMediaCollection('image');
            $replyImage = '
            <div class="reply-image-wrapper">
                 <div class="reply-image-icon"><i class="far fa-image"></i></div>
                 <div class="reply-image-img">
                    <a href="'. $reply->getMedia('image')->first()->getUrl() .'" target="_blank">
                        <img class="reply-image" src="'. $reply->getMedia('image')->first()->getUrl('thumb') .'" alt="">
                    </a>
                </div>
            </div>
            ';
        }



        if(auth()->user()->id == $order->user_id){
            $notfUser = $service->user_id;
        } elseif( auth()->user()->id == $service->user_id ) {
            $notfUser = $order->user_id;
        }
        

        $checkSeenNotf = Notification::where('user_id', $notfUser)->where('seen', 0)->where('order_id', $order->id)->count();


        if( $checkSeenNotf == 0 ){
            $notification = ' <div style="">تعليق جديد على الطلب </div> <div style="margin-top: 15px;" class="text-center"> '.$service->label.'<a  style="margin-top:20px;display:block;"href="/orders/'.$order->id.'">إضغط هنا لتصفح الطلب</a></div>';

            $delete_token = \Str::random(20);
            $data=[];
            $data[] = array(
                'user_id'      => $notfUser, 
                'content'      => $notification, 
                'language'     => 'AR',
                'delete_token' => $delete_token,
                'order_id'     => $order->id,
                "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            );


            $create_notification = Notification::insert($data);
            

        }

        



        return response()->json([
            'error' => 0,
            'message' => 'تم نشر التعليق بنجاح',
            'comment' => $reply->message,
            'image' => ($reply->user->getMedia('avatar')->first()) ? $reply->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png',
            'user' => $reply->user->name,
            'time' => $reply->created_at->calendar(),
            'replyImage' => $replyImage,
            
        ]);

    }/* /addReply() */










    
    public function checkForNewComments(Request $request){

        $order_id = $request->order_id;
        $parnter_id = $request->partner_id;
        $last_comment_id = $request->last_comment;

        $order = Order::find($order_id);
        $newReplies = OrderReply::where('order_id', $order_id)->where('user_id', $parnter_id)->where('id', '>', $last_comment_id)->get();

        $replies_array = [];

     



        foreach($newReplies as $reply){

            $replyImage = '';
            if( $reply->getMedia('image')->first() ){
                
                $replyImage = '
                <div class="reply-image-wrapper">
                        <div class="reply-image-icon"><i class="far fa-image"></i></div>
                        <div class="reply-image-img">
                        <a href="'. $reply->getMedia('image')->first()->getUrl() .'" target="_blank">
                            <img class="reply-image" src="'. $reply->getMedia('image')->first()->getUrl('thumb') .'" alt="">
                        </a>
                    </div>
                </div>
                ';
            }


            $replies_array[] = array(
                'id' => $reply->id,
                'comment' => $reply->message,
                'image' => ($reply->user->getMedia('avatar')->first()) ? $reply->user->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png',
                'user' => $reply->user->name,
                'time' => $reply->created_at->calendar(),
                'replyImage' => $replyImage,
            );
        }
        

        
    


        return response()->json([
            'error' => 0,
            'message' => 'هنالك تعليقات جديدة',
            'replies' => $replies_array,
            'state' => $order->state,
        ]);

            

        

    }/* /checkForNewComments() */










    

    public function rateOrder(Request $request){

        $rate = $request->rate; 
        $orderID = $request->id;


        $order = Order::find($request->id);
        $service = Service::find($order->service_id);
        $owner = User::find($service->user_id);

        if( $order->state == 1 ){
            return response()->json([
                'error' => 1,
                'message' => 'هذا الطلب لم ينته بعد !',
            ]);
        }

        
        // check to see if this user made rating before
        $checkRating = ServiceRate::where('user_id', auth()->user()->id)->where('order_id', $orderID)->get();
        
        if( $checkRating->count() ){
            return response()->json([
                'error' => 1,
                'message' => 'لقد قمت بتقييم هذا الطلب مسبقا'
            ]);
        }
        
        

        $storeRate = ServiceRate::create([
            'service_id' => $order->service_id,
            'service_owner' => $service->user_id,
            'order_id' => $orderID,
            'user_id' => auth()->user()->id,
            'rate' => $rate,
        ]);


        // calculate the new service total rating
        $serviceRatesTotal = \App\ServiceRate::where('service_id', $service->id)->count() * 5;
        $serviceRatesSum = \App\ServiceRate::where('service_id', $service->id)->sum('rate') ;
        
        // calculate the new user total rating
        $ownerRatesTotal = \App\ServiceRate::where('service_owner', $owner->id)->count() * 5;
        $ownereRatesSum = \App\ServiceRate::where('service_owner', $owner->id)->sum('rate') ;

        if($serviceRatesTotal > 0){
            $ratePercentage = ( ($serviceRatesSum / $serviceRatesTotal) * 5 ) ;
        } else{ 
            $ratePercentage = 0;
        }

        $service->rate = $ratePercentage;
        $service->save();

        $owner->rate = $ratePercentage;
        $owner->save();
        
        if(! $storeRate ){
            return response()->json([
                'error' => 1,
                'message' => 'حدث خطأ , حاول مجددا'
            ]);
        }

        return response()->json([
            'error' => 0,
            'message' => "تم التقييم بنجاح, شكرا لك",
        ]);

    }/* /rateOrder() */


    


    public function submitIssue(Request $request){

        $orderId = $request->id;
        $issue = $request->issue;

        $order = Order::find($orderId);
        $service = Service::find($order->service_id);


        if(auth()->user()->id == $order->user_id){
            $notfUser = $service->user_id;
        } elseif( auth()->user()->id == $service->user_id ) {
            $notfUser = $order->user_id;
        }


        $submit = OrderIssue::create([
            'order_id' => $orderId,
            'user_id' => auth()->user()->id,
            'issue_user_id' => $notfUser,
            'state' => 0,
            'issue' => $issue,
        ]);

        if(!$submit){
            return response()->json([
                'error' => 1,
                'message' => 'فشلت العملية حاول مجددا',
            ]);
        }
        

        
        



        $checkSeenNotf = Notification::where('user_id', $notfUser)->where('seen', 0)->where('issue_id', $order->id)->count();


        if( $checkSeenNotf == 0 ){
            $notification = ' <div style="">تم إرسال شكوى ضدك بواسطة</div> <div style="margin-top: 15px;" class="text-center"> '. auth()->user()->name .'<a  style="margin-top:20px;display:block;"href="/complaints/'.$submit->id.'">إضغط هنا لتصفح الشكوى</a></div>';

            $delete_token = \Str::random(20);
            $data=[];
            $data[] = array(
                'user_id'      => $notfUser, 
                'content'      => $notification, 
                'language'     => 'AR',
                'delete_token' => $delete_token,
                'issue_id'     => $order->id,
                "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            );


            $create_notification = Notification::insert($data);
            

        }



        return response()->json([
            'error' => 0,
            'message' => 'تم إرسال الشكوى بنجاح .',
        ]);

    }/* /submitIssue() */



    public function closeIssue(Request $request){
        $issueID = $request->issue_id;
        $issue = OrderIssue::find($issueID);
        $issue->state = 1;
        $issue->save();

        $order = Order::find($issue->order_id);
        $service = Service::find($order->service_id); 


        $notification = ' <div style="">تم إغلاق الشكوى </div> <div style="margin-top: 15px;" class="text-center"> '.$issue->issue.' بواسطة الإدارة<a  style="margin-top:20px;display:block;"href="/complaints/'.$issue->id.'">إضغط هنا لتصفح الشكوى</a></div>';
            
        $checkSeenNotf = Notification::where('user_id', $service->user_id)->where('seen', 0)->where('issue_id', $issue->id)->count();
        if( $checkSeenNotf == 0 ){
            

            $delete_token = \Str::random(20);
            $data=[];
            $data[] = array(
                'user_id'      => $service->user_id, 
                'content'      => $notification, 
                'language'     => 'AR',
                'delete_token' => $delete_token,
                'order_id'     => $order->id,
                "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            );
            $create_notification = Notification::insert($data);
        }



        $checkSeenNotf2 = Notification::where('user_id', $order->user_id)->where('seen', 0)->where('issue_id', $issue->id)->count();
        if( $checkSeenNotf2 == 0 ){
            
            $delete_token = \Str::random(20);
            $data=[];
            $data[] = array(
                'user_id'      => $order->user_id, 
                'content'      => $notification, 
                'language'     => 'AR',
                'delete_token' => $delete_token,
                'order_id'     => $order->id,
                "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            );
            $create_notification = Notification::insert($data);
        }



        

        
         return response()->json([
             'error' => 0,
             'message' => 'تم إغلاق الحالة',
         ]);
    }



    public function updateState(Request $request){

        $orderId = $request->id;
        $newState = $request->newState;

        $order = Order::find($orderId);

        if($order->state != 1){
            return response()->json([
                'error' => 1,
                'message' => 'لا يمكن تغيير الحالة إذا لم تكن جارية',
            ]);
        }

        $update = Order::where('id', $orderId)->update([
            'state' => $newState,
        ]);

        if( ! $update ){
            return response()->json([
                'error' => 1,
                'message' => 'فشلت العملية حاول مجددا',
            ]);
        }


        if($newState==2){
            $stateLabel = 'تم إنهاء الطلب';
        } elseif( $newState == 3 ) {
            $stateLabel = 'تم إلفاء الطلب';
        }
        $notification = ' <div style=""> '.$stateLabel.' بواسطة البائع</div> <div style="margin-top: 15px;" class="text-center"><a href="/orders/'.$order->id.'">إضغط هنا لتصفح الطلب</a></div>';
        $delete_token = \Str::random(20);
        $data=[];
        $data[] = array(
            'user_id'      => $order->user_id, 
            'content'      => $notification, 
            'language'     => 'AR',
            'delete_token' => $delete_token,
            "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
        );


        $create_notification = Notification::insert($data);



        return response()->json([
            'error' => 0,
            'message' => "تم تحديث الطلب",
        ]);

    }



}/* /class */