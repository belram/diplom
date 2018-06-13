<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/', 'IndexController', ['except' => ['show', 'edit', 'update', 'destroy']]);
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['auth']], function() {
	Route::get('/', 'HomeController@index')->name('admin_index');
	Route::resource('/changes', 'TopicsController', ['except' => ['edit']]);
	Route::resource('/category', 'TopicCategoryController', ['except' => ['index', 'create']]);
	Route::resource('/question_answer', 'QuestionAnswerController', ['except' => ['index', 'create', 'destroy']]);
	Route::resource('/answer', 'AnswerController', ['only' => ['edit', 'store']]);
	Route::resource('/administrators', 'AdminController', ['except' => ['edit']]);
	Route::resource('/withoutAnswer', 'WithoutAnswerController', ['except' => ['store', 'create', 'edit']]);
});
