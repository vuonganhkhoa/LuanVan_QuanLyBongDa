<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\TinTuc;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){

            $tintuc = TinTuc::orderBy('NgayDang', 'DESC')->limit(5)->get();
            $view->with([
                'tintuc'=>$tintuc, 
            ]);
                     
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
