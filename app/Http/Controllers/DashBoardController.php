<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
  
    public function __construct(){
        $this->middleware('auth');
    }



    public function assignDashboard(){
        if( auth()->user()->user_type == 10 ){ 
            // admin
            return self::adminDashboard();
        } else { 
            // user
            return self::userDashboard();
        }
    }/* /assignDashboard() */


    public static function userDashboard(){
        return redirect('/');
        $currencies = \App\Currency::all();
        $credits = \App\Credit::all();
        return view('dashboards.user.dashboard', compact('currencies','credits'));
    }/* /adminDashboard() */


    public static function adminDashboard(){
        return view('dashboards.admin.dashboard');
    }/* /adminDashboard() */



}/* /class */
