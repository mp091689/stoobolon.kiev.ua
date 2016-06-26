<?php

namespace App\Listeners;

use App\Events\SendFeedbackMail;
use App\Models\Setting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailTemplate;

class SendFeedbackMailToUser
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
     * @param  SendFeedbackMail  $event
     * @return void
     */
    public function handle(SendFeedbackMail $event)
    {

        $mails = Setting::where('key','emails')->first();
        $emails = explode(',',$mails->value);

        $feedback = $event->feedback;
        $template = EmailTemplate::find(2);
        $template->body = str_replace(
            [       '[name]',       '[phone]',      '[email]',      '[comment]'],
            [$feedback->author,$feedback->phone,$feedback->email,$feedback->body],
            $template->body
        );
        Mail::send('emails.master', ['template' => $template],
            function($m)use($emails, $feedback){
                $m->from($emails[0], 'СТО на Оболони');
                $m->to($feedback->email,$feedback->author);
                $m->subject('Мы получили Ваше сообщение');
            }
        );
    }
}
