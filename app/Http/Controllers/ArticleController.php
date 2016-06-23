<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function getPublicArticles() {
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $page = Page::where('alias','articles')->firstOrFail();
        $articles = Article::paginate(5);
        foreach ($articles as $article){
            $article->body = Str::words($article->body, 50);
        }
        return view('pages.articles', ['menus' => $menus, 'page' => $page, 'articles' => $articles]);
    }
    
    public function getArticle($alias) {
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $article = Article::where('alias',$alias)->firstOrFail();
        return view('pages.single', ['menus' => $menus, 'page' => $article]);
    }

    public function getAll() {
        $allData = Article::paginate(10);
        return view('admin.articles', ['articles' => $allData]);
    }
}
