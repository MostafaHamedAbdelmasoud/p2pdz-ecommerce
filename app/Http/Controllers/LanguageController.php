<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage($lang){

        $default_lang = 'ar';

        if(in_array($lang, ['ar', 'en'])){
            if(auth()->user()){
                $user = auth()->user();
                $user->language = $lang;
                $user->save();
            } else {
                if(session()->has('lang')){
                    session()->forget('lang');
                }
                session()->put('lang', $lang);
            }
        } else {
            if(auth()->user()){
                $user = auth()->user();
                $user->language = $default_lang;
                $user->save();
            } else {
                if(session()->has('lang')){
                    session()->forget('lang');
                }
                session()->put('lang', $default_lang);
            }
        }
        return back();
        
    }/* /setLanguage() */


}/* /class */
