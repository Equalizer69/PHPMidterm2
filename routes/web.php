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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'AdminController@index')->name('index');

Route::get('/students', 'AdminController@students')->name('students');

Route::post('/addtoclass', 'AdminController@store')->name('addtoclass');

Route::get('/class/{id}', 'AdminController@single_class')->name('singleclass');

Route::get('/classes', 'AdminController@classes')->name('classes');

Route::get('/remove/student/{studentid}/class/{classid}', 'AdminController@destroy')->name('deletefromclass');

Route::get('/my_classes', 'AdminController@my_classes')->name('my_classes');

Route::get('/students/{id}', 'AdminController@show')->name('singlestudent');