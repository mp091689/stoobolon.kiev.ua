<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Menu;

class ArticleController extends Controller
{
    public function getArticleIndex($article_alias)
    {
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $article = Article::where('alias',$article_alias)->firstOrFail();
        return view('article.single', ['menus' => $menus, 'article' => $article]);
    }
}
