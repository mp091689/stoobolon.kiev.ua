<?php

namespace App\Listeners;

use App\Events\SendCallbackMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailTemplate;
use App\Models\Setting;

class SendCallbackMailToAdmin
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
     * @param  SendCallbackMail  $event
     * @return void
     */
    public function handle(SendCallbackMail $event)
    {

        $mails = Setting::where('key','emails')->first();
        $emails = explode(',',$mails->value);
        $emails = array_map('trim', $emails);

        $callback = $event->callback;
        $template = EmailTemplate::find(1);
        $template->body = str_replace(
            [   '[name]',           '[phone]',      '[comment]'],
            [$callback->author,$callback->phone,$callback->body],
            $template->body
        );
        Mail::send('emails.master', ['template' => $template],
            function($m)use($emails, $callback){
                $m->from($emails[0]);
                $m->to($emails);
                $m->subject('Обратный звонок: '.$callback->phone);
            }
        );
    }
}
