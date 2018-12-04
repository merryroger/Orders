<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Blade::directive('user', function ($param) {
            switch (strtolower($param)) {
                case 'id':
                    $result = 'Имя: ' . Auth::user()->name . ', Email: ' . Auth::user()->email;
                    break;
                case 'name':
                    $result = 'Имя: ' . Auth::user()->name;
                    break;
                case 'email':
                    $result = 'Email: ' . Auth::user()->email;
                    break;
                default:
                    $result = '';
            }

            return "<b>{$result}</b>";

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
