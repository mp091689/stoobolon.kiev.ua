<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\SocialButtons;
use App\Models\Page;
use App\Models\Setting;

class PageController extends Controller
{
    public function getPageIndex($alias = 'public'){
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $socialbuttons = SocialButtons::where('url', '<>', '')->get();
        $page = Page::where('alias',$alias)->firstOrFail();

        if ($alias == 'public') {
            $page->extra = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/views/includes/publicextracontent.php');
            return view('pages.public', [
                'menus' => $menus,
                'page' => $page,
                'socialbuttons' => $socialbuttons,
            ]);
        } elseif ($alias == 'contacts') {
            $maps = Setting::where('key','maps')->first();
            return view('pages.contacts', [
                'menus' => $menus,
                'page' => $page,
                'socialbuttons' => $socialbuttons,
                'maps' => $maps,
            ]);
        }
        return view('pages.single', [
            'menus' => $menus,
            'page' => $page,
            'socialbuttons' => $socialbuttons,
        ]);
    }
    
    public function getAll() {
        $paginate = Setting::where('key','admin_rows')->first();
        $allPages = Page::paginate($paginate->value);
        foreach ($allPages as $page) {
            if ($page->alias == 'public' ||
                $page->alias == 'articles' ||
                $page->alias == 'reviews' ||
                $page->alias == 'contacts') {
                $page->permition='disabled';
            }
        }
        return view('admin.pages.pages', ['pages' => $allPages]);
    }

    public function getPage($id) {
        $page = Page::find($id);
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        if ($page->alias == 'public' ||
            $page->alias == 'articles' ||
            $page->alias == 'reviews' ||
            $page->alias == 'contacts') {
            $page->permition='disabled';
        }
        return view('admin/pages/page', ['page' => $page]);
    }

    public function getCreate() {
        return view('admin.pages.page-create');
    }

    public function getEdit($id) {
        $page = Page::find($id);
        if ( $id == 1 ) {
            $page->extra = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/views/includes/publicextracontent.php');
        }
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        return view('admin/pages/page-edit', ['page' => $page]);
    }

    public function postCreate(Request $request) {
        if( $request['alias'] == '' || preg_match('/^ +$/', $request['alias']) ) {
            $request['alias'] = $this->strToUrl($request['title']);
        }
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'unique:pages,alias|regex:/^[-a-z0-9]+$/',
            'body' => 'required',
        ]);
        $page = new Page();
        $page->title = $request['title'];
        $page->alias = $request['alias'];
        $page->body = $request['body'];
        $page->public = $request['public'] ? true : false;
        $page->meta_title = $request['meta_title'];
        $page->meta_description = $request['meta_description'];
        $page->meta_keywords = $request['meta_keywords'];
        $page->save();
        return redirect()->route('admin.get.pages')->with(['success' => 'Страница успешно создана']);
    }

    public function postEdit(Request $request) {
        if( $request['alias'] == '' || preg_match('/^ +$/', $request['alias']) ) {
            $request['alias'] = $this->strToUrl($this->$request['alias']);
        }
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'regex:/^[-a-z0-9]+$/|unique:pages,alias,'.$request['id'],
            'body' => 'required',
        ]);
        $page = Page::find($request['id']);
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        if ($request['id'] == 1) {
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/resources/views/includes/publicextracontent.php',$request['extra']);
        }
        $page->title = $request['title'];
        $page->alias = $request['alias'];
        $page->body = $request['body'];
        $page->public = $request['public'] ? true : false;
        $page->meta_title = $request['meta_title'];
        $page->meta_description = $request['meta_description'];
        $page->meta_keywords = $request['meta_keywords'];
        $page->update();
        return redirect()->action('PageController@getPage', $request['id'])->with(['success' => 'Страница успешно изменена']);
    }

    public function getDelete($id) {
        $page = Page::find($id);
        $successMsg = 'Страница успешно удалена';
        if ( !$page ) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        if( Menu::where('page_id',$id)->delete() ){
            $successMsg .= ', так же были удалены связанные со страницей пункты меню';
        }
        $page->delete();
        return redirect()->route('admin.get.pages')->with(['success' => $successMsg]);
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
