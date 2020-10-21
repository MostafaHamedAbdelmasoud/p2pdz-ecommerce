<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdController extends Controller
{


    public function deleteAd(Request $request){

       $deleteAd = Ad::where('id',$request->id)->delete();
        if(!$deleteAd){
            return response()->json([ 'error' => 1, 'message' => 'Something went wrong!' ]);
        }
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully') ]);

    }/* /$ad() */



    public function updateAd(Request $request){

        $ad = Ad::find($request->id);

        $ad->code = $request->code;
        $ad->save();

        return response()->json([
            'error' => 0,
            'message' => $ad->code
        ]);


    }/* /updateAd() */




    

    public function loadOneAd(Request $request){

        $ad_id = $request->id;
        $ad = Ad::find($ad_id);

        return response()->json([
            'error' => 0,
            'message' => 'ok',
            'ad' => $ad,
        ]);

    }/* /loadOneAd() */










    

    public function loadAds(Request $request){

        

        $ads = Ad::all();
        $ads_array=[];
        foreach($ads as $ad){
            $ad_row;
            $ad_row['id'] = $ad->id;
            $ad_row['label'] = $ad->label;
            $ad_row['code'] = "<textarea disabled class='form-control' style='direction:ltr;width:100%;height: 36px;min-height: 36px;'> ".$ad->code." </textarea>";

            $ads_array[] = $ad_row;
        }
        return response()->json(['data' => $ads_array]);
        

    }/* /loadAds() */

    

}/* /class */
