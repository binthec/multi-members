<?php

/**
 *
 * フロント側
 *
 */
Route::domain(env('FRONTEND_DOMAIN'))->group(function () {
    Route::middleware('guest:user')->group(function () {

        //認証系
        Route::get('login', 'Frontend\Auth\LoginController@showLoginForm')->name('user.showLogin');
        Route::post('login', 'Frontend\Auth\LoginController@login')->name('user.login');

        //ホーム
        Route::get('/', 'Frontend\HomeController@index')->name('home');
        Route::get('/about', 'Frontend\HomeController@about')->name('about');

        /**
         * 検索部分
         */
        Route::get('/novels/{tag}', 'Frontend\HomeController@novels')->name('novels');
        Route::post('/novels', 'Frontend\HomeController@searchNovels')->name('search');
    });

    Route::middleware('auth:user')->group(function () {
        //サイト情報
        Route::get('mypage/site/edit', 'Frontend\SiteController@edit')->name('user.site.edit');
        Route::put('mypage/site', 'Frontend\SiteController@update')->name('user.site.update');

        //作品
        Route::get('mypage/novel', 'Frontend\NovelController@index')->name('user.novel');
        Route::get('mypage/novel/create', 'Frontend\NovelController@create')->name('user.novel.create');
        Route::post('mypage/novel', 'Frontend\NovelController@store')->name('user.novel.store');

        //アカウント情報
        Route::get('mypage/user/edit', 'Frontend\UserController@edit')->name('user.edit');
        Route::put('mypage/user', 'Frontend\UserController@update')->name('user.update');
        Route::put('mypage/user/password', 'Frontend\UserController@updatePassword')->name('user.password.update');

        //ログアウト
        Route::post('logout', 'Frontend\Auth\LoginController@logout')->name('user.logout');
    });
});


/**
 *
 * 管理画面側
 *
 */
Route::domain(env('BACKEND_DOMAIN'))->group(function () {
    /**
     * 認証しなくても見られる画面
     */
    Route::middleware('guest:admin')->group(function () {
        Route::get('/', 'Backend\Auth\LoginController@showLoginForm');

        //認証系
        Route::get('login', 'Backend\Auth\LoginController@showLoginForm');
        Route::post('login', 'Backend\Auth\LoginController@login')->name('admin.login');
//		Route::post('password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//		Route::get('password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//		Route::post('password/reset', 'Backend\Auth\ForgotPasswordController@reset');
//		Route::get('password/reset/{token}', 'Backend\Auth\ForgotPasswordController@showResetForm')->name('password.reset');
    });

    /**
     * 認証の必要な画面
     */
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard');

        //ログアウト
        Route::post('logout', 'Backend\Auth\LoginController@logout')->name('logout');

        //活動報告
        Route::get('novel/confirm/{activity}', 'Backend\NovelController@confirm')->name('novel.confirm'); //表示確認
        Route::resource('novel', 'Backend\NovelController');

        //管理ユーザ管理
        Route::get('mypage', 'Backend\AdminController@myPage')->name('admin.mypage');
        Route::put('admin/{admin}', 'Backend\AdminController@update')->name('admin.update');
        Route::put('admin/password/{admin}', 'Backend\AdminController@updatePassword')->name('admin.password.update');

        /**
         * オーナー以上（＝システム管理者とオーナー）にのみ許可された操作
         */
        Route::group(['middleware' => 'can:owner-higher'], function(){
            //ユーザ管理
            Route::get('admin/create', 'Backend\Auth\RegisterController@showRegistrationForm')->name('admin.create');
            Route::post('admin', 'Backend\Auth\RegisterController@register')->name('admin.store');
            Route::get('admin/password/{admin}/edit', 'Backend\AdminController@editPassword')->name('admin.password.edit');
            Route::resource('admin', 'Backend\AdminController', ['except' => ['create', 'store', 'update']]);

            //アクションログ
            Route::resource('actionlog', 'Backend\ActionLogController');
        });

    });
});