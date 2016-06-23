<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function postSendFeedback(Request $request) {
        $this->validate($request, [
            'author' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|regex:/^((\+38)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',
            'body' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->author = $request['author'];
        $feedback->email = $request['email'];
        $feedback->phone = $request['phone'];
        $feedback->body = $request['body'];
        $feedback->attention = true;
        $feedback->save();
        return redirect()->back()->with(['success' => 'Ваше сообщение успешно отправлено. Наши специалисты свяжутся с Вами в кратчайшие сроки.']);
    }
}
