<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credit;
use App\Currency;
use App\Service;
use App\Notification;
use \App\ServiceComment;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class ServiceController extends Controller
{
    

    public function __construct(){
        $settings = \App\Setting::find(1);
        \View::share('settings', $settings);
    }
    
    public function addService(Request $request){


       

        $label = $request->label;
        $main_cat = $request->main_cat;
        $sub_cat = $request->sub_cat;
        $quantity = $request->quantity;
        $price = $request->price;
        $price_desc = $request->price_desc;
        $description = $request->description;
        $tags = $request->tags;
        $duration = $request->duration;
        $requirments = $request->requirments;
        
        
        if( !$label || !$main_cat || !$sub_cat || !$quantity || !$price || !$price_desc || !$description || !$tags || !$duration || !$requirments ){
            return response()->json([ 'error' => 1, 'message' => trans('dashboard.fields_required') ,]);
        }
        
        if(!$request->file('image')){return response()->json([ 'error' => 1, 'message' => trans('dashboard.please_choose_image') ]);}

        
        $service = Service::create([
            'user_id' => auth()->user()->id,
            'label' =>  $label,
            'main_category' => $main_cat,
            'sub_category' => $sub_cat,
            'quantity' => $quantity,
            'price' => $price,
            'price_desc' => $price_desc,
            'quantity' => $quantity,
            'description' => $description,
            'tags' => $tags,
            'duration' => $duration,
            'requirements' => $requirments,
        ]);


        if( !$service ){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }


        $service->addMediaFromRequest('image')->toMediaCollection('service');

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.added_successfully'),
        ]);


    }/* /addService() */
    



    public function fetchService(Request $request){

        $service = Service::find($request->id);
        return response()->json([
            'error' => 0,
            'message' => 'ok',
            'service' => $service,
        ]);

    }/* /fetchService() */





    public function fetchAll(Request $request){

        $services = Service::where('reviewed', 1)->where('archive', 0)->get();

        $services_array = [];

        if( $services->count()>0){
            
            foreach( $services as $service ){

                $service_row = [];
    
                $service_row['id'] = $service->id;
                $service_row['user'] = $service->user->name;
                $service_row['image'] = $service->getMedia('service')->first()->getUrl('thumb');
                $service_row['description'] = $service->description;
                $service_row['created'] = $service->created_at->calendar();
                $service_row['availability'] = $service->availability;

                $services_array[] = $service_row;

            }

        }
        
        return response()->json([
            'data' => $services_array,
        ]);



    }/* /fetchAll() */





    public function updateService(Request $request){
        

        
        $label = $request->label;
        $main_cat = $request->main_cat;
        $sub_cat = $request->sub_cat;
        $quantity = $request->quantity;
        $price = $request->price;
        $price_desc = $request->price_desc;
        $description = $request->description;
        $tags = $request->tags;
        $duration = $request->duration;
        $requirments = $request->requirments;
        
        
        if( !$label || !$main_cat || !$sub_cat || !$quantity || !$price || !$price_desc || !$description || !$tags || !$duration || !$requirments ){
            return response()->json([ 'error' => 1, 'message' => trans('dashboard.fields_required') ,]);
        }
       


        $service = Service::find($request->id);
        
        $service_update = $service->update([
            'label' =>  $label,
            'main_category' => $main_cat,
            'sub_category' => $sub_cat,
            'quantity' => $quantity,
            'price' => $price,
            'price_desc' => $price_desc,
            'quantity' => $quantity,
            'description' => $description,
            'tags' => $tags,
            'duration' => $duration,
            'requirements' => $requirments,
        ]);


        if( !$service_update ){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }

         
        if($request->file('image')){
            $service->clearMediaCollection('service');
            $service->addMediaFromRequest('image')->toMediaCollection('service');
        }

        return response()->json([
            'error' => 0,
            'message' => 'تم تحديث البيانات',
        ]);

    }/* /updateService() */




    public function fetchNewServices(Request $request){
        $services = Service::where('availability', 0)->where('archive', 0)->get();

        $services_array = [];

        if( $services->count()>0){
            
            foreach( $services as $service ){

                $service_row = [];
    
                $service_row['id'] = $service->id;
                $service_row['user'] = $service->user->name;
                $service_row['image'] = $service->getMedia('service')->first()->getUrl('thumb');
                $service_row['description'] = $service->description;
                $service_row['created'] = $service->created_at->calendar();

                $services_array[] = $service_row;

            }

        }
        
        return response()->json([
            'data' => $services_array,
        ]);
    }/* /fetchNewServices() */






    public function acceptService(Request $request){

        $service = Service::where('id',$request->id)->first();
        $service->reviewed = 1;
        $service->availability = 1;
        $service->save();

        $service_user_id = $service->user_id;
        $user = \App\User::find($service_user_id);

        $data = array(
            'name' => $user->name,
            'message' => "تم الموافقة والتفعيل للخدمة التي طلبت تقديمها",
            'link' =>url("/services/".$service->id."/".$service->label),
            'email' => $user->email,
        );


        Mail::to($user->email)->send( new SendMail($data,'تم تفعيل الخدمة','mail.service_approve'));

        $notification = ' تم تفعيل الخدمة ' . $service->label . ' بواسطة الإدارة';
        $delete_token = \Str::random(20);
        $data=[];
        $data[] = array(
            'user_id'      => $service_user_id, 
            'content'      => $notification, 
            'language'     => 'AR',
            'delete_token' => $delete_token,
            "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
        );

        
        $create_notification = Notification::insert($data);

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.updated_successfully'),
        ]);


    }/* /instructions() */







    public function updateAvailability(Request $request){
        
        $id = $request->id;
        $availability = $request->availability;

        $service =  Service::Find($id); 

        $update = Service::where('id', $id)->update([
            'availability' => $availability,
        ]);

        if(!$update){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }

        if($availability == 0){
            $notification = ' <div style="">تم إيقاف الخدمة </div> <div style="margin-top: 15px;" class="text-center">'.$service->label.' بواسطة الإدارة <a  style="margin-top:20px;display:block;"href="/services/'.$service->id.'/'.$service->label.'">إضغط هنا لتصفح الخدمة</a></div>';
        } else {
            $notification = ' <div style="">تم تشغيل الخدمة </div> <div style="margin-top: 15px;" class="text-center">'.$service->label.' بواسطة الإدارة <a  style="margin-top:20px;display:block;"href="/services/'.$service->id.'/'.$service->label.'">إضغط هنا لتصفح الخدمة</a></div>';
        }
        
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
        


        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.updated_successfully'),
        ]);


    }/* /updateAvailability() */


    function delete(Request $request){
        
        $service = Service::where('id',$request->id)->first();
        $service_user_id = $service->user_id;
        
        $countOrders = Order::where('service_id' , $service->id)->where('state', 1)->count();

        if($countOrders){
            return response()->json([ 'error' => 1, 'message' => 'يوجد طلبات غير منتهية على هذه الخدمة' ]);
        }

        $service->archive = 1;
        if($service->availability ==0){
            $service_user_id = $service->user_id;
            $user = \App\User::find($service_user_id);

            $data = array(
                'name' => $user->name,
                'message' => "نأسف لعدم الموفقة على الخدمة التي طلبت تقديمها. نرجو التواصل مع ادارة الموقع لمعرفة الاسباب",
                'email' => $user->email,
            );


            Mail::to($user->email)->send( new SendMail($data,"نعتذر عن رفض الخدمة",'mail.service_approve'));
        }
        $deleteService = $service->save();
    
        if(!$deleteService){
            return response()->json([ 'error' => 1, 'message' => 'Something went wrong!' ]);
        }
        

        // check to see if this is an admin
        if(auth()->user()->user_type == 10){
            $notification = ' تم حذف الخدمة ' . $service->label . ' بواسطة الإدارة';
            $delete_token = \Str::random(20);
    
            $data=[];
            $data[] = array(
                'user_id'      => $service_user_id, 
                'content'      => $notification, 
                'language'     => 'AR',
                'delete_token' => $delete_token,
                "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            );
    
    
            $create_notification = Notification::insert($data);
            
        }
        
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully') ]);

    }/* /delete() */












    public function addComment(Request $request){

        $serviceID = $request->id;
        $reply = $request->reply;

        $service = Service::find($serviceID);


        if( auth()->user()->id == $service->user_id ){
            return response()->json([
                'error' => 1,
                'message' => 'لا يمكنك التعليق على الخدمات الخاصة بك',
            ]);
        }

        if(!$reply){
            return response()->json([
                'error' => 1,
                'message' => 'قم بكتابة التعليق أولا',
            ]);
        }

        // check if the commented person bought the service before adding comment
        $checkBought = Order::where('service_id' , $serviceID)->where('user_id', auth()->user()->id)->count() ;

        if($checkBought < 1 ){
            return response()->json([
                'error' => 1,
                'message' => 'قم بشراء الخدمة أولا ثم علق بتقييمك',
            ]);
        }
        $comment = ServiceComment::create([
            'user_id' => auth()->user()->id,
            'service_id' => $serviceID,
            'comment' => $reply,
        ]);

        if( $comment ){
            
            return response()->json([

                'error' => 0,
                'message' => 'تم إضافة التعليق بنجاح',
                'image' => (auth()->user()->getMedia('avatar')->first()) ? auth()->user()->getMedia('avatar')->first()->getUrl('thumb') : 'https://img.icons8.com/bubbles/150/000000/admin-settings-male.png',
                'name' => auth()->user()->name,
                'time' => $comment->created_at->calendar(),


            ]);

        }


    }









}