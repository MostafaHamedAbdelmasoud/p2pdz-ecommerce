<?php

namespace App\Http\Controllers;

use App\Jobs\sendMails;
use Illuminate\Http\Request;
use App\Notification;
use App\User;

class NotificationController extends Controller
{
    public $msg ; 
    
    public function __construct()
    {
        $settings = \App\Setting::find(1);
        \View::share('settings', $settings);
    }

    public function notificationsCenter(Request $request)
    {

        return view("notifications_center");
    }

    public function userNotifications(Request $request)
    {

        if (auth()->check()) {
            $notifications = Notification::where('user_id', auth()->user()->id)->latest()->take(5)->get();

            if ($notifications->count() > 0) {
                return response()->json([
                    'error' => 0,
                    'message' => 'found',
                    'notifications' => $notifications,
                ]);
            } else {
                return response()->json([
                    'error' => 1,
                    'message' => 'لا يوجد إشعارات حاليا',
                ]);
            }
        } else {
            return response()->json([
                'error' => 1,
                'message' => 'fail',
            ]);
        }
    }

    public function emailNotifications($id)
    {
        $this->msg = Notification::where('id',$id)->first();
        $emails = User::chunk(50,function($data){
            dispatch(new sendMails($data,$this->msg['content']));
        });
        $this->msg->sent =1;
        $this->msg->save();
        return response()->json([
            'error' => 0,
            'message' => 'suceess',
        ]);
    }



    public function userOpenNotification(Request $request)
    {

        $notification = Notification::find($request->id);
        $notification->seen = 1;

        $notification->save();

        return response()->json([
            'error' => 0,
            'message' => $notification,
        ]);
    }



    public function store(Request $request)
    {




        if ($request->notification_audience == 'Universal') {
            $audience = User::all();
        } else {
            $audience = User::where('language', $request->notification_audience)->get();
        }

        if ($audience->count() > 0) {

            $delete_token = \Str::random(20);
            $data = [];

            foreach ($audience as $user) {

                $data[] = array(
                    'user_id'      => $user->id,
                    'content'      => $request->notification_content,
                    'language'     => $request->notification_audience,
                    'delete_token' => $delete_token,
                    'source'       => 'admin',
                    "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                    "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
                );
            }

            $create_notification = Notification::insert($data);
            if (!$create_notification) {
                return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong'),]);
            }
            return response()->json(['error' => 0, 'message' => trans('dashboard.added_successfully'),]);
        } else {
            return response()->json(['error' => 1, 'message' => 'No audience for this language']);
        }
    }/* /store() */




    public function read(Request $request)
    {
        $notification = Notification::where('delete_token', $request->id)->first();
        if ($notification) {
            $notification->update(['seen' => 1]);
            return response()->json(['error' => 0, 'id' => $notification->id, 'content' => $notification->content, 'date' =>  $notification->created_at->calendar()]);
        } else {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong'),]);
        }
    }/* /read() */





    public function fetch(Request $request)
    {

        if ($request->account_type == 'admin') {

            // for admin datatable
            $all_notifications = Notification::where('source', 'admin')->get();
            $all_notifications = $all_notifications->groupBy('content');

            $notifications_array = [];
            // constructing $notifications_array
            foreach ($all_notifications as $notification) {

                $notification_row;
                $notification_row['id']           = $notification[0]->id;
                $notification_row['delete_token'] = $notification[0]->delete_token;
                $notification_row['content']      = "<textarea disabled class='form-control' style='direction:rtl;width:100%;height: 36px;min-height: 36px;text-align:center;'> " . $notification[0]->content . " </textarea>";
                $notification_row['count']        = $notification->count();
                $notification_row['views']        = $notification->where('seen', 1)->count();
                $notification_row['created_at']   = $notification[0]->created_at->calendar();
                $notification_row['sent']   = $notification[0]->sent;

                $notifications_array[] = $notification_row;
            }
            return response()->json(['data' => $notifications_array]);
        } elseif ($request->account_type == 'user') {

            // for user
            // this code will do the following
            // 1- load latest 20 notification for the user
            // 2- load more 20 notification if the user requested
            // 3- load new notifications ( interval ajax )





            $fetch_count = 100;

            if ($request->previous_notifications == 'true') {
                $notifications = Notification::where('user_id', auth()->user()->id)->where('id', '<', $request->bottom_notification)->latest()->skip(0)->take($fetch_count)->get();
            } else {
                $first_load       = $request->first_load; // true or false
                $top_notification = $request->top_notification; // 0 or > 0

                if ($first_load != 'false') {
                    $notifications = Notification::where('user_id', auth()->user()->id)->latest()->skip(0)->take($fetch_count)->get();
                } else {
                    $notifications = Notification::where('id', '>', $top_notification)->where('user_id', auth()->user()->id)->latest()->get();
                    $notifications = $notifications->reverse();
                }
            }




            $notification_html_structure = '';

            if ($notifications->count() > 0) {
                foreach ($notifications as $notification) {

                    // set seen
                    if ($notification->seen == 1) {
                        $seen_icon  = '<i class="far fa-bell"></i>';
                        $seen_class = '';
                    } else {
                        $seen_icon  = '<i class="fas fa-bell"></i>';
                        $seen_class = 'notSeen';
                    }

                    $notification_html_structure .=
                        '<div data-id="' . $notification->id . '" class="header-notification-row ' . $seen_class . '"><div class="notificationSeenIcon">' . $seen_icon . '</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>' . $notification->content . '</div></div></div>';;
                }
            }



            // check to see if there is unknown notifications for the user ( doesn't have to be seen ) = set new notifications counter
            $unseen_notifications_counter =  Notification::where('user_id', auth()->user()->id)->where('seen', 0)->count();

            return response()->json(['data' => $notification_html_structure, 'number_of_unseen_notifications' => $unseen_notifications_counter]);
        }
    }/* /fetch() */










    public function update(Request $request)
    {

        $token = $request->id;
        $notification = $request->notification;

        $update = Notification::where('delete_token', $token)->update([
            'content' => $notification,
        ]);

        if (!$update) {
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.updated_successfully'),
        ]);
    }/* /update() */









    public function delete(Request $request)
    {


        $deleteNotification = Notification::where('delete_token', $request->delete_token)->delete();
        if (!$deleteNotification) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong'),]);
        }
        return response()->json(['error' => 0, 'message' => trans('dashboard.deleted_successfully')]);
    }/* /delete() */
}/* /class */
