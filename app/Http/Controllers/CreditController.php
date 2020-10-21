<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credit;

class CreditController extends Controller
{
    

    public function addCredit(Request $request){

        $credit_title = $request->credit_title;

        if(!$request->file('image')){return response()->json([ 'error' => 1, 'message' => trans('dashboard.please_choose_image') ]);}

        
        $credit = Credit::create([
            'title' => $credit_title,
        ]);
        
        if( !$credit ){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }
        
        

        $credit->addMediaFromRequest('image')->toMediaCollection('icon');

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.added_successfully'),
        ]);

    }/* /addCredit() */





    public function updateCredit(Request $request){

        
        $credit = Credit::where('id', $request->id)->first();
        
        $update = $credit->update([
            'title' => $request->credit_title,
        ]);

        if( !$update ){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }


        if($request->file('image')){
            $credit->addMediaFromRequest('image')->toMediaCollection('icon');
        }

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.updated_successfully'),
        ]);

        

    }/* /updateCredit() */




    public function deleteCredit(Request $request){

        $deleteCredit = Credit::where('id',$request->id)->delete();
        if(!$deleteCredit){
            return response()->json([ 'error' => 1, 'message' => trans('dashboard.something_wrong') ]);
        }
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully')  ]);

    }/* /deleteCredit() */



    public function loadCredits(){
    
        $currencies = Credit::all();

        $currencies_array = [];

        if( $currencies->count()>0){
            
            foreach( $currencies as $credit ){

                $credit_row = [];
    
                $credit_row['id'] = $credit->id;
                $credit_row['icon'] = $credit->getMedia('icon')->first()->getUrl('thumb');
                $credit_row['title'] = $credit->title;

                $currencies_array[] = $credit_row;

            }

        }
        
        return response()->json([
            'data' => $currencies_array,
        ]);
        
    }/* /loadCredits() */


}
