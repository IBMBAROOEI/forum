<?php

namespace App\Providers;

use App\chanel;
use App\Http\View\Composers\NotifyComposer;
use App\thread;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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

        \Schema::defaultStringLength('191');
        \View::composer('*', function ($view) {
            $chanels = chanel::with('threadchanel')->get();
            return $view->with("chanels", $chanels);
        });

        view()->composer('backend.sidebar', NotifyComposer::class);


    }

}
