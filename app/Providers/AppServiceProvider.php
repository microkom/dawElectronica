<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
        view()->composer('*',function($view){
            $view->with('productos',\Session::get('carrito'));
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
