<?php

namespace App\Listeners;

use App\Events\SendReview;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewReviewNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendReview  $event
     * @return void
     */
    public function handle(SendReview $event)
    {
        $review_message = $event->review;
        Mail::send(
            'emails.new-message-notification',
            ['contact_message' => $review_message],
            function($m)use($review_message){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to('mp091689@gmail.com', 'sto obolon amin');
                $m->subject('Новый ОТЗЫВ');
            }
        );
    }
}
