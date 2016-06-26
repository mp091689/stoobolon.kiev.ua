<?php

namespace App\Http\Controllers;

use App\Events\SendFeedbackMail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Feedback;
use Illuminate\Support\Facades\Event;
use App\Models\Setting;

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
        if ( $feedback->save() ) {
            Event::fire(new SendFeedbackMail($feedback));
            return redirect()->back()->with(['success' => 'Ваше сообщение успешно отправлено. Наши специалисты свяжутся с Вами в кратчайшие сроки']);
        }
        return redirect()->back()->with(['fail' => 'Произошла ошибка, попробуйте позже']);

    }

    public function getAll() {
        $paginate = Setting::where('key','admin_rows')->first();
        $allData = Feedback::orderBy('attention','desc')->orderBy('created_at','desc')->paginate($paginate->value);
        return view('admin.feedbacks', ['feedbacks' => $allData]);
    }

    public function getViewed($id){
        $feedback = Feedback::find($id);
        $feedback->attention = false;
        $feedback->save();
        return redirect()
            ->route('admin.get.feedbacks')
            ->with(['success' => 'Запрос #'.$feedback->id.' от '.$feedback->author.' отмечен как "отработанный"']);
    }

}
