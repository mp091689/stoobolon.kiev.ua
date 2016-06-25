<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Review;

class ReviewController extends Controller
{
    public function getAllReviews() {
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $page = Page::where('alias','reviews')->firstOrFail();
        $reviews = Review::orderBy('created_at','desc')->paginate(10);
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
        $review->save();
        return redirect()->back()->with(['success' => 'Ваш отзыв отправлен на проверку, во избежание распространения спама и материала нецензурного содержания.']);
    }

    public function getAll() {
        $allData = Review::orderBy('created_at','desc')->paginate(20);
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
