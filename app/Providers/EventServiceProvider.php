<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SendMessage' => [
            'App\Listeners\NewMessageNotification',
            'App\Listeners\NewMessageConfirmation',
        ],
        'App\Events\SendReview' => [
            'App\Listeners\NewReviewNotification',
            'App\Listeners\NewReviewConfirmation',
        ],
        'App\Events\SendCallBack' => [
            'App\Listeners\NewCallBackNotification',
//            'App\Listeners\NewCallBackConfirmation',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
