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
        if ($page_alias == 'public') {
            return view('pages.index', ['page' => $page, 'menus' => $menus,]);
        } elseif ($page_alias == 'articles') {
            $articles = Article::where('public','1')->orderBy('created_at', 'desc')->get();
            foreach ($articles as $article){
                $article->short_body = Str::words($article->body, 50);
            }
            return view('pages.articles', ['page'=>$page, 'menus' => $menus, 'articles' => $articles]);
        } elseif ($page_alias == 'reviews') {
            $reviews = Review::where('public','1')->orderBy('created_at', 'desc')->get();
            return view('pages.reviews', ['page'=>$page, 'menus' => $menus, 'reviews' => $reviews]);
        }elseif ($page_alias == 'contacts') {
            $json_string = file_get_contents(storage_path().'/administrator_settings/common.json');
            $json_common = json_decode($json_string, true);
            return view('pages.contacts', [
                'page'=>$page,
                'menus' => $menus,
                'json_common' => $json_common,
            ]);
        } else {
            return view('pages.single', ['page'=>$page, 'menus' => $menus]);
        }
    }
}
