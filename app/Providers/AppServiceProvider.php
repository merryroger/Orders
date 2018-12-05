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
            $UserName = 'Имя: ' . Auth::user()->name;
            $Email = 'Email: ' . Auth::user()->email;

            switch (strtolower($param)) {
                case 'name':
                    $result = $UserName;
                    break;
                case 'email':
                    $result = $Email;
                    break;
                case 'id':
                default:
                    $result = $UserName . ', ' . $Email;
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
