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

Route::group(['middleware'=>'web'], function() {
    Route::get('/{page_alias?}', [
        'uses' => 'PageController@getPageIndex',
        'as' => 'pages.single'
    ]);
    Route::get('/article/{article_alias?}', [
        'uses' => 'ArticleController@getArticleIndex',
        'as' => 'article.single'
    ]);
    Route::get('/reviews', [
        'uses' => 'ArticleController@getArticleIndex',
        'as' => 'reviews'
    ]);
    Route::get('/contacts', [
        'uses' => 'PageController@getPageIndex',
        'as' => 'contacts'
    ]);
    Route::post('/reviews/sendreview', [
        'uses' => 'ReviewController@postSendReview',
        'as' => 'review.send'
    ]);
    Route::post('/contacts/sendmessage', [
        'uses' => 'MessagesController@postSendMessage',
        'as' => 'contacts.send'
    ]);
});
