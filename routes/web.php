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
	
	
	Route::group(['prefix'=>'topics'],function() {

		Route::resource('/changes', 'TopicsController', ['except' => ['edit']])->names([
			'index' => 'topics',
			'create' => 'formTopicAdd',
			'store' => 'saveTopicAdd',
			'show' => 'formChangeNameTopic',
			'update' => 'saveNewNameTopic',
			'destroy' => 'deleteTopic'
		]);

		Route::resource('/category', 'TopicCategoryController', ['except' => ['index', 'create']])->names([
			'show' => 'category',
			'edit' => 'formChangeTopic',
			'store' => 'saveChangeTopic',
			'update' => 'changeStatus',
			'destroy' => 'deleteQuestion'
		]);

		Route::resource('/question_answer', 'QuestionAnswerController', ['except' => ['index', 'create', 'destroy']])->names([
			'show' => 'formChangeAnswer',
			'edit' => 'formChangeQuestion',
			'store' => 'saveChangeAnswer',
			'update' => 'saveChangeQuestion'
		]);

		Route::resource('/answer', 'AnswerController', ['only' => ['edit', 'store']])->names([
			'edit' => 'formAnswer',
			'store' => 'saveAnswer'
		]);

	});

	Route::group(['prefix'=>'administrators'],function() {

		Route::resource('/check', 'AdminController', ['except' => ['edit']])->names([
			'index' => 'admins',
			'create' => 'formAddAdmin',
			'store' => 'saveNewAdmin',
			'show' => 'formChangePassword',
			'update' => 'saveNewPassword',
			'destroy' => 'deleteAdmin'
		]);

	});

	Route::group(['prefix'=>'withoutAnswer'],function() {

		Route::resource('/check', 'WithoutAnswerController', ['except' => ['store', 'create', 'edit']])->names([
			'index' => 'allQuestionsW',
			'show' => 'formChangeQuestionW',
			'update' => 'saveQuestionW',
			'destroy' => 'deleteQuestionW'
		]);

	});
});