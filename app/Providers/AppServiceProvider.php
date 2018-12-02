<?php

namespace App\Providers;

use App\Http\Model\BaneryModel;
use App\Http\Model\KonfiguracjaModel;
use App\Http\Model\PagesModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*',function ($view){
           $view->with('menu', $this->app->make('App\Http\Model\MenuPositionModel'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\Model\PagesModel',function (){
            return new PagesModel();
        });
        $this->app->singleton('App\Http\Model\MenuPositionModel',function (){
            return new \App\Http\Model\MenuPositionModel();
        });
        $this->app->singleton('App\Http\Model\KonfiguracjaModel',function (){
            return new KonfiguracjaModel();
        });
        $this->app->singleton('App\Http\Model\BaneryModel',function (){
            return new BaneryModel();
        });
    }
}
