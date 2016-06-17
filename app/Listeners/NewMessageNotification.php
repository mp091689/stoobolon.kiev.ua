<?php

namespace App\Listeners;

use App\Events\SendMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\EmailTemplate;

class NewMessageNotification
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
     * @param  SendMessage  $event
     * @return void
     */
    public function handle(SendMessage $event)
    {
        $json_string = file_get_contents(storage_path().'/administrator_settings/common.json');
        $json_common = json_decode($json_string, true);
        $emails = explode(',',$json_common['admin_email']);
        
        $contact_message = $event->message;
        $template = EmailTemplate::where('id','2')->firstOrFail();
        $template->body = str_replace(
            [
                '[name]',
                '[email]',
                '[phone]',
                '[comment]'
            ],
            [
                $contact_message->author,
                $contact_message->email,
                $contact_message->phone,
                $contact_message->body
            ],
            $template->body
        );
        Mail::send(
            'emails.main',
            ['template' => $template],
            function($m)use($emails, $contact_message){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to($emails, 'sto obolon admin');
                $m->subject('Новый ЗАПРОС от:'.$contact_message->email);
            }
        );
    }
}
