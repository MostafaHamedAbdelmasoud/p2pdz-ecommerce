<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Match;
use App\Contest;
use App\Team;
use App\Video;
use App\User;
use App\TimeZone;
use App\Service;
use App\Order;
use App\orderIssue;
use App\OrderReply;
use App\IssueComment;
use App\ServiceComment;


class SitePagesController extends Controller
{

    public function __construct(){
        $settings = \App\Setting::find(1);
        \View::share('settings', $settings);
    }
  

    public function allSellers(Request $request){

        $sellers = User::query();
        $queries = [];
        $columns = ['verified'];


        foreach( $columns as $column ){
            if( request()->has($column) ){
                $sellers = $sellers->where($column, request( $column));
                $queries[$column] = request($column);
            }
        }

     
        $sellers = $sellers->where('user_type', 1)->latest()->paginate(18)->appends($queries);


        return view('all_sellers', compact('sellers'));
    }


    public function privacyAndPolicy(Request $request){
        return view('privacy-policy');
    }
    public function termsAndConditions(Request $request){
        return view('terms-conditions');
    }

    public function accountSettings(Request $request){
         return view('account_settings');
    }


    public function viewComplaint(Request $request){
        
        $issue = orderIssue::find($request->id);
        $order = Order::find($issue->order_id);
        $service = Service::find($order->service_id);
        $replies = IssueComment::where('issue_id', $issue->id)->get();
        $seller = User::find($service->user_id);

        return view('complaint', \compact('issue','order', 'service', 'replies', 'seller'));
    }


    public function userComplaints(Request $request){

        if(auth()->check()){
            $userID = auth()->user()->id;
        } else {
            $userID = 0;
        }

        $myComplaints = orderIssue::where('user_id', $userID)->orWhere('issue_user_id', $userID)->get();
        return view('user_complaints', compact('myComplaints'));
    }




    public function userProfile(Request $request){

        $user = User::find($request->id);
        $services = Service::where('user_id', $request->id)->where('archive', 0)->orderBy('id', 'desc')->get();

        return view('user_services', compact('services', 'user'));
    }





    public function userCashier(Request $request){

        if(auth()->check()){
            $userID = auth()->user()->id;
        } else {
            $userID = 0;
        }

        $services = Service::where('user_id', $userID)->get();

        $in_id_array = array(0);
        
        foreach( $services as $service ){
            $in_id_array[] = $service->id;
        }

        

        if($request->state){
            $myOrders = Order::whereIn('service_id', $in_id_array)->where('state', $request->state)->get();
        } else {
            $myOrders = Order::whereIn('service_id', $in_id_array)->get();
        }

        return view('cashier', compact('myOrders'));

    }




    public function userOrders(Request $request){
        
        if(auth()->check()){
            $userID = auth()->user()->id;
        } else {
            $userID = 0;
        }

        if($request->state){
            $myOrders = Order::where('user_id', $userID)->where('state', $request->state)->get();
        } else {
            $myOrders = Order::where('user_id', $userID)->get();
        }
        return view('user_orders', compact('myOrders'));

    }



    public function addService(Request $request){
        $currencies = \App\Currency::all();
        $credits = \App\Credit::all();
        return view('add_service', \compact('currencies', 'credits'));
    }

    public function home(){
        
        $moneyOffers = Service::where('main_category', 'money')->where('state', 1)->where('reviewed', 1)->where('archive', 0)->take(12)->orderBy('id', 'desc')->get();
        $creditOffers = Service::where('main_category', 'credit')->where('state', 1)->where('reviewed', 1)->where('archive', 0)->take(12)->orderBy('id', 'desc')->get();

        $currencies = \App\Currency::all();
        $credits = \App\Credit::all();
        return view('home', \compact('moneyOffers', 'creditOffers', 'currencies', 'credits'));
    }/* /home() */
    


    public function service(Request $request){

        $service = Service::find($request->id);
        $replies = ServiceComment::where('service_id', $request->id)->get();
        //return $service;
        return view('service', compact('service', 'replies'));
    }


    public function editService(Request $request){
        $service = Service::find($request->id);
        $currencies = \App\Currency::all();
        $credits = \App\Credit::all();
        return view('edit_service', \compact('currencies', 'credits', 'service'));
    }



    public function makeOrder(Request $request){

        $service = Service::where('id', $request->id)->first();

        return view('make-order', \compact('service'));

    }/* /makeOrder */


    public function questions(){
        $questions = \App\Question::all();
        return view('questions', compact('questions'));
    }



    public function services(){
        
        $services = Service::query();
        $queries = [];
        $columns = ['main_category', 'rate', 'user_verified'];


        foreach( $columns as $column ){
            if( request()->has($column) ){
                $services = $services->where($column, request( $column));
                $queries[$column] = request($column);
            }
        }

     
        $services = $services->where('state', 1)->where('reviewed', 1)->where('archive', 0)->latest()->paginate(18)->appends($queries);

        return view('all-services', compact('services'));
    }







    public function viewMatch(Request $request){

        $timezones = TimeZone::distinct('country')->orderBy('country', 'desc')->get();
        $id    = $request->id;
        $label = urldecode($request->slug);
        $match = Match::where('id', $id)->first();

        \App\MatchView::create([
            'match_id' => $match->id,
        ]);
        
        return view('match', compact('match', 'timezones'));

    }/* /viewMatch() */














    public function videos(){
        $limit = 20;
        $videos = \DB::table('videos')->orderBy('id', 'desc')->paginate($limit);

        //return $videos;

        return view('videos', compact('videos'));

    }/* /videos() */

    


    public function search(Request $request){

        $limit = 20;
        $keyword = $request->keyword;
        $videos = Video::where('video_title_ar', 'LIKE', "%$keyword%")
        ->orWhere('video_title_en', 'LIKE', "%$keyword%")->orderBy('id', 'desc')
        ->orWhere('short_video_title_en', 'LIKE', "%$keyword%")
        ->orWhere('short_video_title_ar', 'LIKE', "%$keyword%")
        ->paginate($limit);

        //return $videos;
        
        return view('search', compact('videos'));

    }/* /search() */





    public function showVideo(Request $request){
        $id    = $request->id;
        $label = urldecode($request->slug);
        $video = Video::where('id', $id)->first();

        //return $video;

        return view('video', compact('video'));
    }/* /showVideo() */








}/* /class */