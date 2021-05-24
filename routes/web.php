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



Route::get('/login', 'User\LoginController@index')->name('User.Login.Index');

Route::post('/login', 'User\LoginController@login')->name('User.Login');

Route::get('/logout', 'User\LoginController@logout')->name('User.Logout');



Route::get('/', 'User\HomeController@index')->name('Index');

Route::get('/exam', 'User\ExamController@index')->name('Exam.Index');

Route::get('/exam/show/{model}','User\ExamController@show')->name('Exam.Show');

Route::get('admin/exam', 'Admin\HomeController@index')->name('Admin.Exam.Index');

Route::get('admin/login', 'Admin\LoginController@index')->name('Admin.Login.Index');

Route::post('admin/login', 'Admin\LoginController@login')->name('Admin.Login');

Route::get('admin/logout', 'Admin\LoginController@logout')->name('Admin.Logout');

Route::group(['prefix' => '/admin','namespace' => 'Admin','as' => 'admin.'],function(){

		Route::get('/','HomeController@index')->name('index');


		//AJAX DATATABLE ROUTELARI
		Route::get('userlist','UserController@userList')->name('user.userlist');


		Route::resource('user','UserController',['parameters' => [
			'user' => 'model'
		]])->except(['show','destroy']);


		//Burada Admin Panelindeki silme işlemleri
		Route::get('user/{model}','UserController@destroy')->name('user.destroy');
		
		Route::get('login',function(){return view('Admin.User.Login');});

		Route::post('login','LoginController@login')->name('login');

		Route::get('logout','LoginController@logout')->name('logout');


});