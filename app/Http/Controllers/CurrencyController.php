<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller
{



    public function addCurrency(Request $request){

        $currency_title = $request->currency_title;

        if(!$request->file('image')){return response()->json([ 'error' => 1, 'message' => trans('dashboard.please_choose_image') ]);}

        
        $currency = Currency::create([
            'title' => $currency_title,
        ]);
        
        if( !$currency ){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }
        
        

        $currency->addMediaFromRequest('image')->toMediaCollection('icon');

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.added_successfully'),
        ]);

    }/* /addCurrency() */





    public function updateCurrency(Request $request){

        
        $currency = Currency::where('id', $request->id)->first();
        
        $update = $currency->update([
            'title' => $request->currency_title,
        ]);

        if( !$update ){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }


        if($request->file('image')){
            $currency->addMediaFromRequest('image')->toMediaCollection('icon');
        }

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.updated_successfully'),
        ]);

        

    }/* /updateCurrency() */




    public function deleteCurrency(Request $request){

        $deleteCurrency = Currency::where('id',$request->id)->delete();
        if(!$deleteCurrency){
            return response()->json([ 'error' => 1, 'message' => trans('dashboard.something_wrong') ]);
        }
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully')  ]);

    }/* /deleteCurrency() */



    public function loadCurrencies(){
    
        $currencies = Currency::all();

        $currencies_array = [];

        if( $currencies->count()>0){
            
            foreach( $currencies as $currency ){

                $currency_row = [];
    
                $currency_row['id'] = $currency->id;
                $currency_row['icon'] = $currency->getMedia('icon')->first()->getUrl('thumb');
                $currency_row['title'] = $currency->title;

                $currencies_array[] = $currency_row;

            }

        }
        
        return response()->json([
            'data' => $currencies_array,
        ]);
        
    }/* /loadCurrencies() */




}/* /class */
