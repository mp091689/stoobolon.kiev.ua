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
        return view('admin.articles.articles', ['articles' => $allData]);
    }

    public function getById($id) {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.get.articles')->with(['fail' => 'Страница не найдена']);
        }
        return view('admin/articles/article', ['article' => $article]);
    }

    public function getCreate() {
        return view('admin.articles.article-create');
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'unique:pages,alias|regex:/^[-a-z0-9]+$/',
            'body' => 'required',
        ]);
        $article = new Article();
        $article->title = $request['title'];
        $article->alias = $request['alias'];
        $article->body = $request['body'];
        $article->public = $request['public'] ? true : false;
        $article->meta_title = $request['meta_title'];
        $article->meta_description = $request['meta_description'];
        $article->meta_keywords = $request['meta_keywords'];
        $article->save();
        return redirect()->route('admin.get.articles')->with(['success' => 'Статья успешно создана']);
    }

    public function getEdit($id) {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.get.articles')->with(['fail' => 'Статья не найдена']);
        }
        return view('admin/articles/article-edit', ['article' => $article]);
    }

    public function postEdit(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'regex:/^[-a-z0-9]+$/|unique:articles,alias,'.$request['id'],
            'body' => 'required',
        ]);
        $article = Article::find($request['id']);
        if (!$article) {
            return redirect()->route('admin.get.articles')->with(['fail' => 'Статья не найдена']);
        }
        $article->title = $request['title'];
        $article->alias = $request['alias'];
        $article->body = $request['body'];
        $article->public = $request['public'] ? true : false;
        $article->meta_title = $request['meta_title'];
        $article->meta_description = $request['meta_description'];
        $article->meta_keywords = $request['meta_keywords'];
        $article->update();
        return redirect()->route('admin.get.articles')->with(['success' => 'Статья успешно изменена']);
    }

    public function getDelete($id) {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.get.articles')->with(['fail' => 'Статья не найдена']);
        }
        $article->delete();
        return redirect()->route('admin.get.articles')->with(['success' => 'Статья успешно удалена']);
    }
}
