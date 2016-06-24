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

Route::auth();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('/', [
        'uses' => 'AdminController@getDashboard',
        'as' => 'admin.get.dashboard'
    ]);
    Route::get('/pages', [
        'uses' => 'PageController@getAll',
        'as' => 'admin.get.pages'
    ]);
    Route::get('/page/create', [
        'uses' => 'PageController@getCreate',
        'as' => 'admin.get.page.create'
    ]);
    Route::post('/page/create', [
        'uses' => 'PageController@postCreate',
        'as' => 'admin.post.page.create'
    ]);
    Route::get('page/{id}/edit', [
        'uses' => 'PageController@getEdit',
        'as' => 'admin.get.page.edit'
    ]);
    Route::post('page/edit', [
        'uses' => 'PageController@postEdit',
        'as' => 'admin.post.page.edit'
    ]);
    Route::get('page/{id}/delete', [
        'uses' => 'PageController@getDelete',
        'as' => 'admin.get.page.delete'
    ]);
    Route::get('page/{id}', [
        'uses' => 'PageController@getPage',
        'as' => 'admin.get.page'
    ]);
    Route::get('/articles', [
        'uses' => 'ArticleController@getAll',
        'as' => 'admin.get.articles'
    ]);
    Route::get('/menus', [
        'uses' => 'MenuController@getAll',
        'as' => 'admin.get.menus'
    ]);
    Route::get('/callbacks', [
        'uses' => 'CallbackController@getAll',
        'as' => 'admin.get.callbacks'
    ]);
    Route::get('/feedbacks', [
        'uses' => 'FeedbackController@getAll',
        'as' => 'admin.get.feedbacks'
    ]);
    Route::get('/reviews', [
        'uses' => 'ReviewController@getAll',
        'as' => 'admin.get.reviews'
    ]);
    
});

Route::group(['middleware' => 'web'], function() {

    Route::get('/articles', [
        'uses' => 'ArticleController@getPublicArticles',
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
    Route::post('/reviews/send', [
        'uses' => 'ReviewController@postSendReview',
        'as' => 'post.send.review'
    ]);
    Route::post('/contacts/send', [
        'uses' => 'FeedbackController@postSendFeedback',
        'as' => 'post.send.feedback'
    ]);
    Route::post('/callback/send', [
        'uses' => 'CallbackController@postSendCallback',
        'as' => 'post.send.callback'
    ]);
    Route::get('/{alias?}', [
        'uses' => 'PageController@getPageIndex',
        'as' => 'page'
    ]);
    
});
