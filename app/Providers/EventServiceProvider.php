<?php

namespace App\Providers;

use App\Events\ProductDeleted;
use App\Events\ProductRestored;
use App\Listeners\OnProductDeleted;
use App\Listeners\OnProductRestored;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductDeleted::class => [
            OnProductDeleted::class,
        ],
        ProductRestored::class => [
            OnProductRestored::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
