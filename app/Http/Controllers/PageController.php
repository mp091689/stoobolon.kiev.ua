<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;
use App\Article;
use App\Menu;
use App\Review;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function getPageIndex($page_alias = 'public')
    {
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $page = Page::where('alias',$page_alias)->firstOrFail();
        if ($page_alias == 'articles') {
            $articles = Article::where('public','1')->orderBy('created_at')->get();
            foreach ($articles as $article){
                $article->short_body = Str::words($article->body, 50);
            }
            return view('page.articles', ['page'=>$page, 'menus' => $menus, 'articles' => $articles]);
        } elseif ($page_alias == 'reviews') {
            $reviews = Review::where('public','1')->orderBy('created_at')->get();
            return view('page.reviews', ['page'=>$page, 'menus' => $menus, 'reviews' => $reviews]);
        } else {
            return view('page.single', ['page'=>$page, 'menus' => $menus]);
        }
    }
}
