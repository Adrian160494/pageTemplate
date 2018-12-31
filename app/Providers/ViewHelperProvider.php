<?php

namespace App\Providers;

use App\Helpers\ImgAdressHelper;
use App\Helpers\MenuHelper;
use App\Helpers\PostsHelper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewHelperProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*',function ($view){
            $view->with('imgAdress',app()->make('ImgAdressHelper'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ImgAdressHelper',function (){
            return new ImgAdressHelper();
        });
        $this->app->singleton('MenuHelper',function (){
            return new MenuHelper();
        });
        $this->app->singleton('PostHelper',function (){
            return new PostsHelper();
        });
    }
}
