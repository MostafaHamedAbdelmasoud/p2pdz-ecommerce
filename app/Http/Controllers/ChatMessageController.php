<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatMessage;
use App\User;
use DB;
use Illuminate\Support\Str;
use App\Online;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Carbon;

class ChatMessageController extends Controller
{
    


   

    
    public function fetchOneConversationForAdmin(Request $request){


        $limit = 15;
        
        $conversation = ChatMessage::where('chat_message_id', $request->conversation_id)->latest()->take($limit)->get();
        $conversation = $conversation->sortBy('id');
        
        $get_info = true;
        $conversation_info = [];
        $conversation_html = '';
        $primary_user = 0;

        if($conversation->count() > 0){


            foreach($conversation as $reply){

                
                // this code run only one time
                if($get_info){
                    
                    $from_user = User::find($reply->from_user_id);
                    $to_user = User::find($reply->to_user_id);
                    $primary_user = $reply->from_user_id;

                    $from_user_img = ($from_user->getMedia('avatar')->first()) ? $from_user->getMedia('avatar')->first()->getUrl('thumb'): url('/images/chat/avatar_placeholder.svg');
                    $to_user_img = ($to_user->getMedia('avatar')->first()) ? $to_user->getMedia('avatar')->first()->getUrl('thumb'): url('/images/chat/avatar_placeholder.svg');

                    $conversation_info['from_user_id'] = $from_user->id;
                    $conversation_info['from_user_name'] = "<p  style='max-width: 100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'>".$from_user->name."</p>";
                    $conversation_info['from_user_img'] = "<img src='". $from_user_img ."' />";
                    $conversation_info['from_username'] = "<div class='d-none sub-chat-users-tab'>" . $from_user->name . "</div>";
                    

                    $conversation_info['to_user_id'] = $to_user->id;
                    $conversation_info['to_user_name'] = "<p>".$to_user->name."</p>";
                    $conversation_info['to_user_img'] = "<img src='". $to_user_img ."' />";
                    $conversation_info['to_username'] = "<div class='d-none sub-chat-users-tab'>" . $to_user->name . "</div>";

                    $get_info = false;
                }
                // this code run only one time


                $rtl = ($this->isRtl($reply->chat_message))? 'text-right': 'text-left' ;
                $replyBelongsTo = ($reply->from_user_id == $primary_user)? 'current_user_reply' : 'partner_user_reply admin-view';

                $conversation_html .= '
                
                <div class="conversation_reply_row '.$rtl.' '. $replyBelongsTo .'" data-reply-id="'. $reply->id .'" data-reply-user-id="'. $reply->from_user_id .'">
                    <span>'. $reply->chat_message .'</span>
                </div>

                ';
            }

        } else {
            $conversation_html = '
            <div class=""></div>
            ';
        }

        return response()->json([
            'error' => 0,
            'message' => 'ok',
            'replies' => $conversation_html ,
            'info' => $conversation_info,
        ]);

    }/* /fetchOneConversationForAdmin() */






    public function fetchAllForAdmin(Request $request){


        $userId = auth()->user()->id;
        
        // load latest $limit conversation
        $conversations = DB::table('chat_messages')->select('*') 
        ->join(DB::raw('(Select max(id) as id from chat_messages group by chat_message_id) LatestMessage'), 
        function($join) {
            $join->on('chat_messages.id', '=', 'LatestMessage.id');
        })->where(function($query) use($userId){
            $query->where('to_user_id', '!=',$userId)->where('from_user_id', '!=',$userId);
        })
        ->orderBy('created_at', 'desc')->get();


        

        $conversations_array = [];

        if($conversations->count()>0){

            foreach($conversations as $conversation){
                
                $user_one = User::find($conversation->from_user_id);
                $user_two = User::find($conversation->to_user_id);

                //if(!$user_one)

                $conversation_row;
                $conversation_row['id']        = $conversation->chat_message_id;
                $conversation_row['from_user_id']  = $user_one->name;
                $conversation_row['to_user_id']  = $user_two->name;
                $conversation_row['created_at']   = $conversation->created_at;

                $conversations_array[] = $conversation_row;

            }
        }


        return response()->json([
            'data' => $conversations_array,
        ]);






    }/* /fetchAllForAdmin() */









    
    public function fetchConversations(Request $request){

        $userId = auth()->user()->id;
        $limit = 7;


        if($request->last_conversation_id){
            
            // load latest $limit conversation
            $last_conversation_id = $request->last_conversation_id;
            $last_conversation_row_id = $request ->last_conversation_row_id;

            // get conversations
            $conversations = \DB::table('chat_messages')->select('*') 
            ->join(\DB::raw('(Select max(id) as id from chat_messages group by chat_message_id) LatestMessage'), function($join) {
                    $join->on('chat_messages.id', '=', 'LatestMessage.id');
            })
            ->where('chat_messages.id', '<', $last_conversation_row_id)->where(function($query) use($userId){
                $query->where('to_user_id', $userId)->orWhere('from_user_id', $userId);
            })->orderBy('created_at', 'desc')->take($limit)->get();


        } elseif ($request->top_conversation_id){
        

            // load latest $limit conversation
            $top_conversation_id = $request->top_conversation_id;
            $top_conversation_row_id = $request ->top_conversation_row_id;

            // get conversations
            $conversations = \DB::table('chat_messages')->select('*') 
            ->join(\DB::raw('(Select max(id) as id from chat_messages group by chat_message_id) LatestMessage'), function($join) {
                    $join->on('chat_messages.id', '=', 'LatestMessage.id');
            })
            ->where('chat_messages.id', '>', $top_conversation_row_id)->where(function($query) use($userId){
                $query->where('to_user_id', $userId)->orWhere('from_user_id', $userId);
            })->orderBy('created_at', 'desc')->get();
        

        } else {


            // load latest $limit conversation
            $conversations = DB::table('chat_messages')->select('*') 
            ->join(DB::raw('(Select max(id) as id from chat_messages group by chat_message_id) LatestMessage'), 
            function($join) {
                $join->on('chat_messages.id', '=', 'LatestMessage.id');
            })
            ->where(function($query) use($userId){
                $query->where('to_user_id', $userId)->orWhere('from_user_id', $userId);
            })
            ->orderBy('created_at', 'desc')->take($limit)->get();

        }



        
        
        
        // this array will only be used if there is new incoming conversations
        $conversations_ids_array = [];

        $conversations_html_structure = '';
        if($conversations->count()>0){


            foreach($conversations as $conversation ){

                

                // check for partner account id
                if($conversation->to_user_id == $userId){
                    $chat_partner_id = $conversation->from_user_id;
                } else {
                    $chat_partner_id = $conversation->to_user_id;
                }

                // get partner info
                $chat_partner = User::where('id', $chat_partner_id)->first();

                
                // check if the partner account exists , will display conversation only if exists
                if($chat_partner){
                    if($chat_partner->count()>0){

                        array_push($conversations_ids_array, $conversation->chat_message_id );

                        // get total unseen replies
                        $total_notseen_replies = ChatMessage::where('chat_message_id', $conversation->chat_message_id)->where('from_user_id', '!=', $userId)->where('seen', 0)->where('chat_message', '<>' , '')->count();
                        
                        $partner_img = ($chat_partner->getMedia('avatar')->first()) ? $chat_partner->getMedia('avatar')->first()->getUrl('thumb'): url('/images/chat/avatar_placeholder.svg');

                        $conversations_html_structure .= '
                        <div class="conversation-row" data-partner-id="'. $chat_partner->id .'" data-conversation-id="'. $conversation->chat_message_id .'" data-conversation-row-id="'. $conversation->id .'">
                            <div class="online-circle" data-online-state="'. $chat_partner_id .'"></div>
                            <div class="conversation-row-partner-image">
                                <img src="'.  $partner_img .'" />
                            </div>
                            <div class="conversation-row-partner-name">'. $chat_partner->name .'</div>
                            <div class="conversation-row-notseen-messages-count"><span>'. $total_notseen_replies .'</span>&nbsp;:&nbsp;<i class="far fa-envelope"></i></div>
                        </div>
                        ';

                    }
                }/* /if(partner) */
            }/* /foreach */
        }/* /if(count) */

        
        $countUnread = 0;
        $countNotifications = 0;
        if( auth()->check() ){
            // check for messages counter
            $countUnread = \DB::table('chat_messages')->distinct('chat_message_id')->where('to_user_id', auth()->user()->id)->where('seen', 0)->count();
            
            // check for notification counter
            $countNotifications = \App\Notification::where('user_id', auth()->user()->id)->where('seen', 0)->count();
        }

        return response()->json([
            'error' => 0,
            'message' => 'conversations request success',
            'conversations' => $conversations_html_structure,
            'conversations_ids_array' => $conversations_ids_array,
            'countUnread' => $countUnread,
            'countNotifications' => $countNotifications
        ]);
        




    }/* /fetchConversations() */


  



    public function fetchOneConversation(Request $request){

        


        // check to see if the conversation exists to get the conversation id
        $user_id = auth()->user()->id;
        $partner_id =  $request->partner_id;
       

        $check_conversation = ChatMessage::latest()->where(function($query) use($user_id, $partner_id){
            $query->where('from_user_id',  $user_id)->where('to_user_id', $partner_id);
        })->orWhere(function($query) use($user_id, $partner_id){
            $query->where('from_user_id', $partner_id)->where('to_user_id', $user_id);
        })->get();




        // check if this is a new chat cpnversation or existing one
        if( $check_conversation->count()){
            // existing conversation
            $conversation_id = $check_conversation[0]->chat_message_id;
        } else {
            // new conversation
            $statement = DB::select("SHOW TABLE STATUS LIKE 'chat_messages'");
            $nextId = $statement[0]->Auto_increment;

            $new_conversation = ChatMessage::create([
                'chat_message_id' => $nextId.rand(1, 99),
                'to_user_id' => $partner_id,
                'from_user_id' => $user_id,
                'chat_message' => '',
            ]);
            $conversation_id = $new_conversation->chat_message_id;
        }


    
        

        $limit = 15;
        
        //$conversation = ChatMessage::where('chat_message_id', $request->conversation_id)->latest()->take($limit)->get();
        $conversation = ChatMessage::where('chat_message_id',  $conversation_id)->where('chat_message', '!=', '')->latest()->take($limit)->get();
        $conversation = $conversation->sortBy('id');
        $conversation_html = '';

        if($conversation->count() > 0){

            ChatMessage::where('chat_message_id',  $conversation_id)->where('from_user_id', '!=', auth()->user()->id)->update([
                'seen' => 1,
            ]);

            foreach($conversation as $reply){
                $rtl = ($this->isRtl($reply->chat_message))? 'text-right': 'text-left' ;
                $replyBelongsTo = ($reply->from_user_id == auth()->user()->id)? 'current_user_reply' : 'partner_user_reply admin-view';

                $conversation_html .= '
                
                <div class="conversation_reply_row '.$rtl.' '. $replyBelongsTo .'" data-reply-id="'. $reply->id .'" data-reply-user-id="'. $reply->from_user_id .'">
                    <span>'. $reply->chat_message .'</span>
                </div>

                ';
            }

        } else {
            $conversation_html = '
            <div class=""></div>
            ';
        }

        return response()->json([
            'error' => 0,
            'message' => 'ok',
            'replies' => $conversation_html ,
            'conversation_id' => $conversation_id,
        ]);

    }/* /fetchOneConversation() */






    public function addImage(Request $request){

        $conversation_id = $request->conversation_id;


        // get conversation info
        $conversation = ChatMessage::where('chat_message_id', $conversation_id)->first();
        
        if($conversation->count()>0){

            
            if($conversation->from_user_id==auth()->user()->id){
                $to_user_id = $conversation->to_user_id;
            } else {
                $to_user_id = $conversation->from_user_id;
            }


            $add_reply = ChatMessage::create([
                'chat_message_id' => $conversation_id,
                'to_user_id'  => $to_user_id,
                'from_user_id' => auth()->user()->id,
                'chat_message' => ' ',
            ]);

           
                
            if($add_reply){

                $add_reply->addMediaFromRequest('image')->toMediaCollection('image');

                $add_reply->chat_message = "<a style='border-radius: 2px;overflow: hidden;display:inline-block;height: 70px;width: 100px;' target='_blank' href='". $add_reply->getMedia('image')->first()->getUrl() ."'><img style='height:100%;width:100%;object-fit:cover;' src='".$add_reply->getMedia('image')->first()->getUrl('thumb')."' /></a>";
                $add_reply->save();

                //$rtl = ($this->isRtl($conversation_reply))? 'text-right': 'text-left' ;
                $replyBelongsTo = 'current_user_reply';

                $reply_html = '
                <div class="conversation_reply_row '. $replyBelongsTo .'"><span style="background-color:#efefef;padding:0px !important;" > ' .  $add_reply->chat_message . ' </span></div>
                ';

                return response()->json([
                    'error'   => 0,
                    'message' => 'ok',
                    'reply'   => $reply_html,
                ]);
            } else {
                return response()->json([
                    'error'   => 1,
                    'message' => 'Something went wrong',
                ]);
            }

        }

        

    }/* /addImage() */






    public function addReplyToConversation(Request $request){


        $conversation_id = $request->conversation_id;
        $conversation_reply = $request->conversation_reply;

        if($conversation_reply){

            // get conversation info
            $conversation = ChatMessage::where('chat_message_id', $conversation_id)->first();
            
            if($conversation->count()>0){

                
                if($conversation->from_user_id==auth()->user()->id){
                    $to_user_id = $conversation->to_user_id;
                } else {
                    $to_user_id = $conversation->from_user_id;
                }


                $add_reply = ChatMessage::create([
                    'chat_message_id' => $conversation_id,
                    'to_user_id'  => $to_user_id,
                    'from_user_id' => auth()->user()->id,
                    'chat_message' => $conversation_reply,
                ]);
                    
                if($add_reply){

                    $rtl = ($this->isRtl($conversation_reply))? 'text-right': 'text-left' ;
                    $replyBelongsTo = 'current_user_reply';
                    $reply_html = '
                    <div class="conversation_reply_row '.$rtl.' '. $replyBelongsTo .'"><span>'. $conversation_reply .'</span></div>
                    ';

                    if ( Online::where('user_id', '=', $to_user_id)->exists()) {
                        //echo "user";
                        if(strtotime(Carbon::now())-strtotime(Online::where('user_id', '=', $to_user_id)->first()->online)>30){
                            //echo" away";
                            $user = \App\User::find($to_user_id);

                            $data = array(
                                'name' => $user->name,
                                'message' => "قام ".auth()->user()->name." "."بارسال رسالة جديدة  لك. قم بزيارة الموقع لرؤيتها ",
                                'link' =>url("/"),
                                'email' => $user->email,
                            );


                            Mail::to($user->email)->send( new SendMail($data,"وصلتك رسالة جديدة",'mail.service_approve'));
                            //echo " mail sent";
                            

                        }
                        
                    } else{
                        $user = \App\User::find($to_user_id);

                            $data = array(
                                'name' => $user->name,
                                'message' => "قام ".auth()->user()->name." "."بارسال رسالة جديدة  لك. قم بزيارة الموقع لرؤيتها ",
                                'link' =>url("/"),
                                'email' => $user->email,
                            );


                            Mail::to($user->email)->send( new SendMail($data,"وصلتك رسالة جديدة",'mail.service_approve'));
                            //echo " mail sent";
                    }
                    return response()->json([
                        'error'   => 0,
                        'message' => 'ok',
                        'reply'   => $reply_html,
                    ]);
                } else {
                    return response()->json([
                        'error'   => 1,
                        'message' => 'Something went wrong',
                    ]);
                }

            }
            

        }

        

    }/* /addReplyToConversation() */





    public function checkForPartnerReplies(Request $request){

        $partner_new_replies = ChatMessage::where('chat_message_id',$request->conversation_id)
                                            ->where('from_user_id', '<>', auth()->user()->id)
                                            ->where('id', '>', $request->last_partner_reply)->get();

                                            
        if($partner_new_replies->count()>0){
            
            ChatMessage::where('chat_message_id', $request->conversation_id)->where('from_user_id', '!=', auth()->user()->id)->update([
                'seen' => 1,
            ]);

            $replies_html = '';

            foreach($partner_new_replies as $reply){
                $rtl = ($this->isRtl($reply->chat_message))? 'text-right': 'text-left';
                $replyBelongsTo = 'partner_user_reply';

                $replies_html .= '
                <div class="conversation_reply_row '.$rtl.' '. $replyBelongsTo .'" data-reply-id="'. $reply->id .'" data-reply-user-id="'. $reply->from_user_id .'">
                    <span>'. $reply->chat_message .'</span>
                </div>
                ';
            }
            
            return response()->json([
                'error' => 0,
                'message' => 'ok',
                'replies' => $replies_html,
            ]);

        }


    }/* /checkForPartnerReplies() */





    public function loadPreviousReplies(Request $request){
   

        $limit = 15;
        /* 
        $conversation = ChatMessage::where('chat_message_id', $request->conversation_id)->latest()->take($limit)->get();
        $conversation = $conversation->sortBy('id');
         */

         
        /* return response()->json([
            'error' => 1,
            'message' => $request->top_reply,
        ]); */

        

        $previous_replies = ChatMessage::where('chat_message_id',$request->conversation_id)
                                            ->where('id', '<', $request->top_reply)->latest()->take($limit)->get();

        $previous_replies = $previous_replies->sortBy('id');
                                            
        if($previous_replies->count()>0){
            
            $replies_html = '';

            foreach($previous_replies as $reply){

                if($reply->chat_message!= ''){
                    $rtl = ($this->isRtl($reply->chat_message))? 'text-right': 'text-left' ;
                    $replyBelongsTo = ($reply->from_user_id == auth()->user()->id)? 'current_user_reply' : 'partner_user_reply';

                    $replies_html .= '
                    <div class="conversation_reply_row '.$rtl.' '. $replyBelongsTo .'" data-reply-id="'. $reply->id .'" data-reply-user-id="'. $reply->from_user_id .'">
                        <span>'. $reply->chat_message .'</span>
                    </div>
                    ';
                }
                
            }

            return response()->json([
                'error' => 0,
                'message' => 'ok',
                'replies' => $replies_html,
            ]);

        }



    }/* /loadPreviousReplies() */




    function isRtl($value) {
        $rtlChar = '/[\x{0590}-\x{083F}]|[\x{08A0}-\x{08FF}]|[\x{FB1D}-\x{FDFF}]|[\x{FE70}-\x{FEFF}]/u';
        return preg_match($rtlChar, $value) != 0;
    }
    

}/* /class */