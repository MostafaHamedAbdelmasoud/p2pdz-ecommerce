<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function updateSocial(Request $request){

        $fb =  $request->fb;
        $tw =  $request->tw;
        $yt =  $request->yt;
        $ins =  $request->ins;

        if(!$fb or !$tw or !$yt or !$ins){
            return response()->json([
                'error' => 1,
                'message' => 'بعض الحقول مطلوبة',
            ]);
        }

        $update = Setting::where('id', 1)->update([
            'facebook' => $fb,
            'twitter' => $tw,
            'youtube' => $yt,
            'instagram' => $ins
        ]);

        return response()->json([
            'error' => 0,
            'message' => 'تم تحديث بيانات السوشيال ميديا',
        ]);
        
    }
    



    public function updateContact(Request $request){

        $phone = $request->phoneText;
        $email = $request->emailText;

        if(!$phone or !$email){
            return response()->json([
                'error' => 1,
                'message' => 'بعض الحقول مطلوبة',
            ]);
        }

        $update = Setting::where('id', 1)->update([
            'phone' => $phone,
            'email' => $email,
        ]);

        return response()->json([
            'error' => 0,
            'message' => 'تم تحديث بيانات التواصل',
        ]);

    }
    



    public function updateAbout(Request $request){
        
        $about = $request->aboutText;

        if(!$about){
            return response()->json([
                'error' => 1,
                'message' => 'بعض الحقول مطلوبة',
            ]);
        }

        $update = Setting::where('id', 1)->update([
            'about' => $about,
        ]);

        return response()->json([
            'error' => 0,
            'message' => 'تم تحديث بيانات تعريف الموقع',
        ]);  
    }
}
