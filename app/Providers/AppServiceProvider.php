<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::share('version', 16);
        \View::share('domain', \Request::server ("HTTP_HOST"));
        if( \Request::server ("HTTP_HOST") == "127.0.0.1:8000" or \Request::server ("HTTP_HOST") == "127.0.0.1:3000" ){
            \View::share('asset_path', '');
        } else {
            \View::share('asset_path', 'public/');
        }
        
        app()->singleton('Lang', function()
        {
            if(auth()->user()){
                if(empty(auth()->user()->language)){
                    return 'ar';
                } else {
                    return auth()->user()->language;
                }
            } else {
                if(session()->has('lang')){
                    return session()->get('lang');
                } else {
                    return 'ar';
                }
            }
        });
    }
}
