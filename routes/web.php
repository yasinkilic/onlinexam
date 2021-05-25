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



Route::get('/login', 'User\LoginController@index')->name('user.login.index');

Route::post('/login', 'User\LoginController@login')->name('user.login');

Route::get('/logout', 'User\LoginController@logout')->name('user.logout');



Route::get('/', 'User\HomeController@index')->name('index');

Route::get('/exam', 'User\ExamController@index')->name('exam.index');

Route::get('/exam/show/{model}','User\ExamController@show')->name('exam.show');



Route::group(['prefix' => '/admin','namespace' => 'Admin','as' => 'admin.'],function(){

		Route::get('/','HomeController@index')->name('index');


		//AJAX DATATABLE ROUTELARI
		Route::get('userlist','UserController@userList')->name('user.userlist');


		Route::resource('user','UserController',['parameters' => [
			'user' => 'model'
		]])->except(['show','destroy']);

		Route::resource('exam','ExamController',['parameters' => [
			'exam' => 'model'
		]])->except(['show','destroy']);


		//Burada Admin Panelindeki silme işlemleri
		Route::get('user/{model}','UserController@destroy')->name('user.destroy');
		
		Route::get('login','LoginController@index')->name('login.index');

		Route::post('login','LoginController@login')->name('login');

		Route::get('logout','LoginController@logout')->name('logout');


});