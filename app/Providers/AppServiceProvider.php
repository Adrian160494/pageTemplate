<?php

namespace App\Providers;

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
        $this->app->singleton('App\Http\Model\MenuPositionModel',function (){
            return new \App\Http\Model\MenuPositionModel();
        });
    }
}
