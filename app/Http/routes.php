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
    Route::get('/page/{id}/edit', [
        'uses' => 'PageController@getEdit',
        'as' => 'admin.get.page.edit'
    ]);
    Route::post('/page/edit', [
        'uses' => 'PageController@postEdit',
        'as' => 'admin.post.page.edit'
    ]);
    Route::get('/page/{id}/delete', [
        'uses' => 'PageController@getDelete',
        'as' => 'admin.get.page.delete'
    ]);
    Route::get('/page/{id}', [
        'uses' => 'PageController@getPage',
        'as' => 'admin.get.page'
    ]);
    Route::get('/articles', [
        'uses' => 'ArticleController@getAll',
        'as' => 'admin.get.articles'
    ]);
    Route::get('/article/create', [
        'uses' => 'ArticleController@getCreate',
        'as' => 'admin.get.article.create'
    ]);
    Route::post('/article/create', [
        'uses' => 'ArticleController@postCreate',
        'as' => 'admin.post.article.create'
    ]);
    Route::get('/article/{id}/edit', [
        'uses' => 'ArticleController@getEdit',
        'as' => 'admin.get.article.edit'
    ]);
    Route::post('/article/edit', [
        'uses' => 'ArticleController@postEdit',
        'as' => 'admin.post.article.edit'
    ]);
    Route::get('/article/{id}/delete', [
        'uses' => 'ArticleController@getDelete',
        'as' => 'admin.get.article.delete'
    ]);
    Route::get('/article/{id}', [
        'uses' => 'ArticleController@getById',
        'as' => 'admin.get.article'
    ]);
    Route::get('/menus', [
        'uses' => 'MenuController@getAll',
        'as' => 'admin.get.menus'
    ]);
    Route::post('/menu/create', [
        'uses' => 'MenuController@postCreate',
        'as' => 'admin.post.menu.create'
    ]);
    Route::post('/menu/edit', [
        'uses' => 'MenuController@postEdit',
        'as' => 'admin.post.menu.edit'
    ]);
    Route::get('/menu/{id}/delete', [
        'uses' => 'MenuController@getDelete',
        'as' => 'admin.get.menu.delete'
    ]);
    Route::get('/callbacks', [
        'uses' => 'CallbackController@getAll',
        'as' => 'admin.get.callbacks'
    ]);
    Route::get('/callback/{id}/viewed', [
        'uses' => 'CallbackController@getViewed',
        'as' => 'admin.get.callback.viewed',
    ]);
    Route::get('/feedbacks', [
        'uses' => 'FeedbackController@getAll',
        'as' => 'admin.get.feedbacks'
    ]);
    Route::get('/feedback/{id}/viewed', [
        'uses' => 'FeedbackController@getViewed',
        'as' => 'admin.get.feedback.viewed',
    ]);
    Route::get('/reviews', [
        'uses' => 'ReviewController@getAll',
        'as' => 'admin.get.reviews'
    ]);
    Route::get('/review/{id}/public', [
        'uses' => 'ReviewController@getPublic',
        'as' => 'admin.get.review.public',
    ]);
    Route::get('/review/{id}/delete', [
        'uses' => 'ReviewController@getDelete',
        'as' => 'admin.get.review.delete',
    ]);
    Route::get('/emails', [
        'uses' => 'EmailTemplateController@getAll',
        'as' => 'admin.get.emails'
    ]);
    Route::get('/email/{id}', [
        'uses' => 'EmailTemplateController@getById',
        'as' => 'admin.get.email'
    ]);
    Route::get('/email/{id}/edit', [
        'uses' => 'EmailTemplateController@getEdit',
        'as' => 'admin.get.email.edit'
    ]);
    Route::post('/email/edit', [
        'uses' => 'EmailTemplateController@postEdit',
        'as' => 'admin.post.email.edit'
    ]);
    Route::get('/settings', [
        'uses' => 'SettingsController@getSettings',
        'as' => 'admin.get.settings'
    ]);
    Route::post('/settings/set', [
        'uses' => 'SettingsController@postSet',
        'as' => 'admin.post.settings.set'
    ]);
    Route::get('/user', [
        'uses' => 'Auth\UserController@getUser',
        'as' => 'admin.get.user'
    ]);
    Route::post('/user/set/email', [
        'uses' => 'Auth\UserController@postSetEmail',
        'as' => 'admin.post.user.set.email'
    ]);
    Route::post('/user/set/pass', [
        'uses' => 'Auth\UserController@postSetPass',
        'as' => 'admin.post.user.set.pass'
    ]);
    Route::get('/soc-icons', [
        'uses' => 'SocialButtonsController@getAll',
        'as' => 'admin.get.socialbuttons'
    ]);
    Route::post('/soc-icons/set', [
        'uses' => 'SocialButtonsController@postSetUrl',
        'as' => 'admin.post.socialbuttons.set.url'
    ]);
});

/**
 * Starting with laravel 5.2
 * middleware => web - included automatically
 * there no need to include it manually
 */
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
