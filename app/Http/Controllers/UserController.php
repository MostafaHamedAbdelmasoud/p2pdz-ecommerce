<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function updateInfo(Request $request)
    {
        $name = $request->user_name;
        $bio = $request->user_bio;


        if (!$name or !$bio) {
            return response()->json([
                'error' => 1,
                'message' => 'بعض الحقول مطلوبة',
            ]);
        }

        $update = User::where('id', auth()->user()->id)->update([
            'name' => $name,
            'bio' => $bio,
        ]);

        if (!$update) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong')]);
        }
        return response()->json(['error' => 0, 'message' => trans('dashboard.updated_successfully')]);
    }




    public function updateLocation(Request $request)
    {

        $name = $request->user_name;
        $country = $request->user_country;
        $city = $request->user_city;

        if (!$country or !$city) {
            return response()->json([
                'error' => 1,
                'message' => 'بعض الحقول مطلوبة',
            ]);
        }

        $update = User::where('id', auth()->user()->id)->update([
            'country' => $country,
            'city' => $city,
        ]);

        if (!$update) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong')]);
        }
        return response()->json(['error' => 0, 'message' => trans('dashboard.updated_successfully')]);
    }

    public function allUsers(Request $request)
    {
        $users = User::all();
        return Response()->json([
            'data' => $users
        ]);
        // if ($request->source) {
        // }
    }/* /allUsers() */



    public function changeState(Request $request)
    {
        $update_state = User::where('id', $request->id)->update(['state' => $request->new_state]);
        if (!$update_state) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong')]);
        }
        return response()->json(['error' => 0, 'message' => trans('dashboard.updated_successfully')]);
    }/* /changeState() */




    public function changeVerification(Request $request)
    {

        $update_verification = User::where('id', $request->id)->update(['verified' => $request->new_verification]);
        if (!$update_verification) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong')]);
        }

        if ($request->new_verification == 1) {
            $notification = 'تم توثيق حسابك بنجاح بواسطة الإدارة';
        } elseif ($request->new_verification == 0) {
            $notification = 'تم حذف توثيق حسابك بواسطة الإدارة';
        }
        $delete_token = \Str::random(20);
        $data = [];
        $data[] = array(
            'user_id'      => $request->id,
            'content'      => $notification,
            'language'     => 'AR',
            'delete_token' => $delete_token,
            "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
        );


        $create_notification = \App\Notification::insert($data);


        \App\Service::where('user_id', $request->id)->update([
            'user_verified' => $request->new_verification,
        ]);


        return response()->json(['error' => 0, 'message' => trans('dashboard.updated_successfully')]);
    }/* /changeVerification() */



    public function changeAccountType(Request $request)
    {

        $id = $request->account_id;
        $email = $request->account_email;
        $account_type = $request->account_type;

        $update_account_type = User::where('id', $id)->where('email', $email)->update(['user_type' => $account_type]);
        if (!$update_account_type) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong')]);
        }


        if ($account_type == 1) {
            \App\Service::where('user_id', $id)->update([
                'availability' => 1,
            ]);
            $notification = 'قامت الإدارة بتغيير حسابك إلى حساب بائع';
        } elseif ($account_type == 0) {
            \App\Service::where('user_id', $id)->update([
                'availability' => 0,
            ]);
            $notification = 'قامت الإدارة بتغيير حسابك إلى حساب عادى دون صلاحيات البيع';
        } elseif ($account_type == 10) {
            $notification = 'قامت الإدارة بترقية حسابك إلى حساب إدارة';
        }

        $delete_token = \Str::random(20);
        $data = [];
        $data[] = array(
            'user_id'      => $id,
            'content'      => $notification,
            'language'     => 'AR',
            'delete_token' => $delete_token,
            "created_at"   => date('Y-m-d H:i:s'), # new \Datetime()
            "updated_at"   => date('Y-m-d H:i:s'), # new \Datetime()
        );


        $create_notification = \App\Notification::insert($data);




        return response()->json(['error' => 0, 'message' => trans('dashboard.updated_successfully')]);
    }/* /changeAccountType() */


    public function changePassword(Request $request)
    {

        $logged_in    = $request->logged_in;
        $user_id      = $request->user_id;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $new_password_confirmation = $request->new_password_confirmation;

        if (!$old_password || !$new_password || !$new_password_confirmation) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.fields_required'),]);
        }
        if ($new_password != $new_password_confirmation) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.passwords_not_the_same')]);
        }
        if (strlen(trim($new_password)) < 6) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.passwords_must_6_char')]);
        }

        if ($logged_in) {
            // change the current logged in account password
            $user_id = auth()->user()->id;
            $current_password = auth()->user()->password;
        } else {
            // admin changing a user account password using it's ( id = $user_id )
            $user_info = User::where('id', $user_id)->first();
            $user_id = $user_info->id;
            $current_password = $user_info->password;
        }


        // check to see if the old password is correct
        if (Hash::check($old_password, $current_password)) {
            // old pass is okay now update password
            $update = User::where("id", '=', $user_id)->update(['password' => Hash::make($new_password)]);
            if ($update) {
                return response()->json(['error' => 0, 'message' =>  trans('dashboard.updated_successfully')]);
            }
            return response()->json(['error' => 1, 'message' => trans('dashboard.update_failed')]);
        }

        return response()->json(['error' => 1, 'message' => trans('dashboard.incorrect_data')]);
    }/* /changePassword() */





    public function changeProfilePicture(Request $request)
    {


        if (!$request->file('image')) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.please_choose_image')]);
        }

        auth()->user()->addMediaFromRequest('image')->toMediaCollection('avatar');

        return response()->json([
            'error'   => 0,
            'message' => trans('dashboard.updated_successfully'),
            'thumb'   => auth()->user()->getMedia('avatar')->first()->getUrl('thumb'),
            'card'    => auth()->user()->getMedia('avatar')->first()->getUrl('card'),
        ]);
    }/* /changeProfilePicture() */



    public function delete(Request $request)
    {
        $deleteUser = User::where('id', $request->id)->delete();
        if (!$deleteUser) {
            return response()->json(['error' => 1, 'message' => trans('dashboard.something_wrong')]);
        }
        return response()->json(['error' => 0, 'message' => trans('dashboard.deleted_successfully')]);
    }/* /delete() */
}/* /class */
