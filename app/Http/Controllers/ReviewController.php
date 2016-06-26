<?php

namespace App\Http\Controllers;

use App\Events\SendReviewMail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Support\Facades\Event;

class ReviewController extends Controller
{
    public function getAllReviews() {
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $page = Page::where('alias','reviews')->firstOrFail();
        $paginate = Setting::where('key','review_rows')->first();
        $reviews = Review::where('public','1')->orderBy('created_at','desc')->paginate($paginate->value);
        return view('pages.reviews', ['menus' => $menus, 'page' => $page, 'reviews' => $reviews]);
    }

    public function postSendReview(Request $request) {
        $this->validate($request, [
            'author' => 'required|max:100',
            'email' => 'required|email',
            'body' => 'required',
        ]);

        $review = new Review();
        $review->author = $request['author'];
        $review->email = $request['email'];
        $review->body = $request['body'];
        $review->public = false;
        if ( $review->save() ) {
            Event::fire(new SendReviewMail($review));
            return redirect()->back()->with(['success' => 'Спасибо, Ваш отзыв отправлен на проверку, во избежание распространения спама и материала нецензурного содержания.']);
        }
        return redirect()->back()->with(['fail' => 'Произошла ошибка, попробуйте позже']);
    }

    public function getAll() {
        $paginate = Setting::where('key','admin_rows')->first();
        $allData = Review::orderBy('created_at','desc')->paginate($paginate->value);
        return view('admin.reviews', ['reviews' => $allData]);
    }

    public function getPublic($id){
        $review = Review::find($id);
        $review->public = true;
        $review->save();
        return redirect()
            ->route('admin.get.reviews')
            ->with(['success' => 'Отзыв #'.$review->id.' от '.$review->author.' одобрен']);
    }

    public function getDelete($id){
        $review = Review::find($id);
        if (!$review) {
            return redirect()->route('admin.get.reviews')->with(['fail' => 'Отзыв не найден']);
        }
        $review->delete();
        return redirect()->route('admin.get.reviews')->with(['success' => 'Отзыв успешно удален']);
    }

}
