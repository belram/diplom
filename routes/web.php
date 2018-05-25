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
		
		// blog.loc/admin/topics
		// Отображение общей таблицы с темами. Удаление темы
		Route::match(['get','post'],'/{alias?}',['uses'=>'TopicsController@execute','as'=>'topics']);
		
		// blog.loc/admin/topics/add
		// Отображение и обработка формы для добавления темы
		Route::match(['get','post'],'/add/new_topic',['uses'=>'TopicsAddController@addTopic','as'=>'topicsAdd']);

		// blog.loc/admin/topics/change_name
		// Отображение и обработка формы для изменения названия темы
		Route::match(['get','post'],'/change_name/{alias}',['uses'=>'TopicChangeNameController@changeName','as'=>'changeName']);

		// blog.loc/admin/topics/change_name
		// Отображение и обработка формы для изменения названия темы
		//Route::post('/delete_topic/{alias}',['uses'=>'DeleteTopicController@deleteTopic','as'=>'deleteTopic']);

		Route::group(['prefix'=>'category'],function() {
			
			// blog.loc/admin/topics/category/basics
			// Отображение таблицы с данными по определенной теме. Измение статуса. Удаление вопроса и ответа
			Route::match(['get','post'],'/{topic}',['uses'=>'TopicCategoryController@execute','as'=>'topicsCategory']);

			// blog.loc/admin/topics/category/change_cat/basics
			// Отображение и обработка формы для изменения названия категории по отдельному вопросу.
			Route::match(['get','post'],'/change_cat/{topic}', ['uses'=>'ChangeCatController@execute','as'=>'changeCat']);

			// blog.loc/admin/topics/category/change_question/basics
			// Отображение и обработка формы для изменения формулировки вопроса.
			Route::match(['get','post'],'/change_question/{topic}', ['uses'=>'ChangeQuestController@execute','as'=>'changeQuestion']);

			// blog.loc/admin/topics/category/change_ans/basics
			// Отображение и обработка формы для изменения формулировки вопроса.
			Route::match(['get','post'],'/change_ans/{topic}', ['uses'=>'ChangeAnswerController@execute','as'=>'changeAnswer']);

			// blog.loc/admin/topics/category/change_ans/basics
			// Отображение и обработка формы подготовки вопроса.
			Route::match(['get','post'],'/answer/{topic}', ['uses'=>'AnswerController@execute','as'=>'answer']);	

		});
	});


	Route::group(['prefix'=>'administrators'],function() {

		Route::match(['get','post'],'/',['uses'=>'AdministratorsController@execute','as'=>'allAdministrators']);










	});















	Route::group(['prefix'=>'withoutAnswer'],function() {

		Route::match(['get','post'],'/{id?}',['uses'=>'WithoutAnswerController@execute','as'=>'withoutAnswer']);

		Route::match(['get','post'],'correct_question/{id}',['uses'=>'CorrectQuestionController@execute','as'=>'correctQuest']);

	});


});




// Route::get('/admin', 'HomeController@index')->name('admin');