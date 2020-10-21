<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Online;
use App\User;
use \Carbon\Carbon;
class OnlineController extends Controller
{


    public function checkStates(Request $request){


        if(auth()->check()){
            if ( Online::where('user_id', '=', auth()->user()->id)->exists()) {
                Online::where('user_id', '=', auth()->user()->id)->update([
                    'online' => Carbon::now(),
                ]);
            } else {
                Online::create([
                    'user_id' => auth()->user()->id,
                    'online' => Carbon::now(),
                ]);
            }
        }

        //return Carbon::now()->subMinutes(5);

        $onlineUsers = Online::where('online', '>' , Carbon::now()->subSeconds(5))->get();


        return response()->json([
            'error' => 0,
            'message' => 'Online Users',
            'online_users' => $onlineUsers,
        ]);
    }


}

