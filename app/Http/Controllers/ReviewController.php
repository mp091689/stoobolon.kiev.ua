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
        $reviews = Review::paginate(10);
        return view('pages.reviews', ['menus' => $menus, 'page' => $page, 'reviews' => $reviews]);
    }
}
