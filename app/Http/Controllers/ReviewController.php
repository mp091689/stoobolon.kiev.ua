<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Review;
use Illuminate\Support\Facades\Event;
use App\Events\SendReview;

class ReviewController extends Controller
{
    public function postSendReview(Request $request)
    {
        $this->validate($request, [
            'author' => 'required|max:100',
            'email' => 'required|email',
            'body' => 'required|min:10',
        ]);

        $review = new Review();
        $review->author = $request['author'];
        $review->email = $request['email'];
        $review->body = $request['body'];
        $review->public = false;
        $review->save();
        Event::fire(new SendReview($review));
        return redirect()->route('reviews')->with(['success' => 'Ваш отзыв отправлен на проверку, во избежание распространения спама и материала нецензурного содержания.']);
    }
}
