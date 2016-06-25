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
        $allData = Article::orderBy('created_at','desc')->paginate(10);
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
        if( $request['alias'] == '' || preg_match('/^ +$/', $request['alias']) ) {
            $request['alias'] = $this->strToUrl($request['title']);
        }
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'unique:articles,alias|regex:/^[-a-z0-9]+$/',
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
        if( $request['alias'] == '' || preg_match('/^ +$/', $request['alias']) ) {
            $request['alias'] = $this->strToUrl($request['title']);
        }
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

    public function rusToTranslit($string){
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'j',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',    'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'ju',  'я' => 'ja',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'J',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Ju',  'Я' => 'Ja',
        );
        return strtr($string, $converter);
    }

    public function strToUrl($string){
        $str = $string;
        // переводим в транслит
        $str = $this->rusToTranslit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('/[^-a-z0-9]+/', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

}
