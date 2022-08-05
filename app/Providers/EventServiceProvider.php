<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [  // aquí definimos los eventos y los listenners de cada evento
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\ProjectSaved::class => [
            \App\Listeners\OptimizeProjectImage::class
        ],
        '\App\Events\BoletinEnviado' => [
            '\App\Listeners\SendaAutoresponder',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
