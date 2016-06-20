<?php

namespace App\Listeners;

use App\Events\SendCallBack;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\EmailTemplate;

class NewCallBackNotification
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
     * @param  SendCallBack  $event
     * @return void
     */
    public function handle(SendCallBack $event)
    {
        $json_string = file_get_contents(storage_path().'/administrator_settings/common.json');
        $json_common = json_decode($json_string, true);
        $emails = explode(',',$json_common['admin_email']);

        $callback = $event->callback;
        $template = EmailTemplate::where('id','6')->firstOrFail();
        $template->body = str_replace(
            [
                '[name]',
//                '[email]',
                '[phone]',
                '[comment]'
            ],
            [
                $callback->author,
//                $callback->email,
                $callback->phone,
                $callback->body
            ],
            $template->body
        );
        Mail::send(
            'emails.main',
            ['template' => $template],
            function($m)use($emails, $callback){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to($emails, 'sto obolon admin');
                $m->subject('CallBack ЗАПРОС от:'.$callback->phone);
            }
        );
    }
}
