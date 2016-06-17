<?php

namespace App\Listeners;

use App\Events\SendReview;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\EmailTemplate;

class NewReviewConfirmation
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
        $template = EmailTemplate::where('id','3')->firstOrFail();
        $template->body = str_replace(
            [
                '[name]',
                '[email]',
                '[phone]',
                '[comment]'
            ],
            [
                $review_message->author,
                $review_message->email,
                $review_message->phone,
                $review_message->body
            ],
            $template->body
        );
        Mail::send(
            'emails.main',
            ['template' => $template],
            function($m)use($review_message){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to($review_message->email,$review_message->author);
                $m->subject('Мы получили Ваш отзыв');
            }
        );
    }
}
