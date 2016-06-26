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
        'App\Events\SendCallbackMail' => [
            //no mail to user, because no email field in the form
            'App\Listeners\SendCallbackMailToAdmin',
        ],
        'App\Events\SendFeedbackMail' => [
            'App\Listeners\SendFeedbackMailToUser',
            'App\Listeners\SendFeedbackMailToAdmin',
        ],
        'App\Events\SendReviewMail' => [
            'App\Listeners\SendReviewMailToUser',
            'App\Listeners\SendReviewMailToAdmin',
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
