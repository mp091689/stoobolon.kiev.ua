<?php

namespace App\Listeners;

use App\Events\SendReviewMail;
use App\Models\Setting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailTemplate;

class SendReviewMailToUser
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
     * @param  SendReviewMail  $event
     * @return void
     */
    public function handle(SendReviewMail $event)
    {
        $mails = Setting::where('key','emails')->first();
        $emails = explode(',',$mails->value);
        $emails = array_map('trim', $emails);
        
        $review = $event->review;
        $template = EmailTemplate::find(4);
        $template->body = str_replace(
            [    '[name]',       '[phone]',      '[email]',      '[comment]'],
            [$review->author,$review->phone,$review->email,$review->body],
            $template->body
        );

        if ( $template->active ) {
            Mail::send('emails.master', ['template' => $template],
                function($m)use($emails, $review){
                    $m->from($emails[0],'СТО "На Оболони"');
                    $m->to($review->email,$review->author);
                    $m->subject('Мы получили Ваше сообщение');
                }
            );
        }
    }
}
