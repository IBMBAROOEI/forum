<?php
Route::get('/error', function () {
    return view('backend.block');
})->name('erorr');
Auth::routes (['verify' => true]);

/* route front*/
Route::group(['middleware' => ['auth','role:admin|writer|users','permission:edit post|delete post| create post|view post']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/replay', 'ReplayController@store')->name('replay');
    Route::get('/create', 'ThreadController@create')->name('create');
    Route::get('/allthread', 'ThreadController@index')->name('show_thread');
    Route::post('/store', 'ThreadController@store')->name('store_thread');
    Route::get('/show/{id}', 'ThreadController@show')->name('show');
    Route::post('/like', ['uses' => 'ThreadController@like', 'as' => 'like',]);
    Route::post('/search', 'SearchController@search')->name('search');
});
Route::group(['middleware' => ['auth','role:admin','permission:edit post|delete post| create post|view post']], function () {
    /*users*/
    Route::resource('backend/users', 'backend\UsersController', ['names' => 'backend.user']);
    Route::get('backend/users/{user}', 'backend\UsersController@update_user')->name('backend.flag');

    /*thread*/
    Route::resource('backend/thread', 'backend\ThreadController', ['names' =>'backend.thread']);
    Route::get('backend/thread/{thread}', 'backend\ThreadController@updateThtread')->name('backend.flag')/*active or disable thraed*/;
    /*answer*/
    Route::resource('backend/replay', 'backend\AnswerController', ['names' => 'backend.answer']);
    Route::get('backend/replay/{answer}', 'backend\AnswerController@updateanswer')->name('backend.answer.flag');
    /* chanel*/
    Route::resource('backend/chanel', 'backend\ChanelController', ['names' => 'backend.chanel']);
    /*permision role user*/
    Route::resource('backend/user', 'backend\Users_roleController',['names'=>'backend.user.role']);
    Route::resource('backend/role', 'backend\RoleController',['names'=>'backend.role']);
});

Route::group(['middleware' => ['auth','role:admin|users|writer','permission:edit post|delete post|create post|view post']], function () {
    /*backend_information_user answer*/
    Route::resource('answer', 'backend_information_user\AnswerController',['names' =>'answer.user']);
    Route::get('backend/answer/{answer}', 'backend_information_user\AnswerController@updateanswer')->name('backend.answer.flag');
    /*information_user thread*/
    Route::resource('thread', 'backend_information_user\ThreadController',['names' =>'thread.user']);
    Route::get('backend/thread/{thread}', 'backend_information_user\ThreadController@updatethread')->name('backend.thread.flag');
    /*information_user  user*/
    Route::resource('profile', 'backend_information_user\UsersController', ['names' =>'user.profile']);

});


