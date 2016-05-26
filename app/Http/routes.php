<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('page.single');
//});
//
Route::get('/{page_alias?}',[
    'uses' => 'PageController@getPageIndex',
    'as' => 'page.single'
]);
Route::get('/article/{article_alias?}',[
    'uses' => 'ArticleController@getArticleIndex',
    'as' => 'article.single'
]);
Route::get('/reviews',[
    'uses' => 'ArticleController@getArticleIndex',
    'as' => 'article.single'
]);