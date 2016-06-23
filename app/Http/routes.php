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

Route::group(['middleware'=>'web'], function() {

    Route::get('/articles', [
        'uses' => 'ArticleController@getAllArticles',
        'as' => 'articles'
    ]);
    Route::get('/article/{alias}', [
        'uses' => 'ArticleController@getArticle',
        'as' => 'article'
    ]);
    Route::get('/reviews', [
        'uses' => 'ReviewController@getAllReviews',
        'as' => 'reviews'
    ]);

    Route::get('/{alias?}', [
        'uses' => 'PageController@getPageIndex',
        'as' => 'page'
    ]);
    
});
