<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CartSuccess' => [
            'App\Listeners\MailToCustomer',
            'App\Listeners\NotificationToAdmin',
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

        \Event::listen('products.view', 'App\Events\ViewProductHandler');
        \Event::listen('posts.view', 'App\Events\ViewPostHandler');
    }
}
