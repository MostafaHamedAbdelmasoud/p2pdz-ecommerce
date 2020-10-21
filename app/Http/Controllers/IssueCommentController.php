<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IssueComment;
use App\OrderIssue;
use App\Service;
use App\Order;
use App\Notification;

class IssueCommentController extends Controller
{
    


    public function __construct(){
        $settings = \App\Setting::find(1);
        \View::share('settings', $settings);
    }


    public function addReply(Request $request){
        
        $issueID = $request->id;
        $reply = $request->reply;

        $issue = OrderIssue::find($issueID);
        $order = Order::find($issue->order_id);
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


        $reply = IssueComment::create([
            'user_id' => auth()->user()->id,
            'issue_id' => $issueID,
            'message' => $reply,    
        ]);


        if( ! $reply ){
            return response()->json([
                'error' => 1,
                'message' => 'فشلت العملية حاول مجددا',
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











        if(auth()->user()->id != $order->user_id && auth()->user()->id != $service->user_id){


            $notification = ' <div style="">تعليق جديد على الشكوى </div> <div style="margin-top: 15px;" class="text-center"> '.$order->message.'<a  style="margin-top:20px;display:block;"href="/complaints/'.$issue->id.'">إضغط هنا لتصفح الشكوى</a></div>';
            
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


        } elseif( auth()->user()->id == $service->user_id ) {
            
            $notfUser = $order->user_id;

            $checkSeenNotf = Notification::where('user_id',  $notfUser)->where('seen', 0)->where('issue_id', $issue->id)->count();
            if( $checkSeenNotf == 0 ){
                $notification = ' <div style="">تعليق جديد على الشكوى </div> <div style="margin-top: 15px;" class="text-center"> '.$order->message.'<a  style="margin-top:20px;display:block;"href="/complaints/'.$issue->id.'">إضغط هنا لتصفح الشكوى</a></div>';

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

        } elseif(auth()->user()->id == $order->user_id){
            $notfUser = $service->user_id;
           
            $checkSeenNotf = Notification::where('user_id',  $notfUser)->where('seen', 0)->where('issue_id', $issue->id)->count();
            if( $checkSeenNotf == 0 ){
                $notification = ' <div style="">تعليق جديد على الشكوى </div> <div style="margin-top: 15px;" class="text-center"> '.$order->message.'<a  style="margin-top:20px;display:block;"href="/complaints/'.$issue->id.'">إضغط هنا لتصفح الشكوى</a></div>';

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

        $issue_id = $request->issue_id;
        $last_comment_id = $request->last_comment;

        $issue = OrderIssue::find($issue_id);

        $newReplies = IssueComment::where('issue_id', $issue_id)->where('user_id', '<>', auth()->user()->id)->where('id', '>', $last_comment_id)->get();

        $replies_array = [];
        $message = '';

        if( $newReplies->count() > 0 ){

            $message = 'هنالك تعليقات جديدة';

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
                    'user_id' => $reply->user->id,
                    'time' => $reply->created_at->calendar(),
                    'replyImage' => $replyImage,
                );
            }
            
             

        }

        return response()->json([
            'error' => 0,
            'message' => $message,
            'replies' => $replies_array,
            'issue' => $issue,
        ]);

    }/* /checkForNewComments() */




}/* /class */
