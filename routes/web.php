<?php

/*
 *
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',  'LoginController@index')->middleware('guest');

Route::post('/proses_login', 'LoginController@masuk');
Route::get('/proses_logout', 'LoginController@keluar');

Route::get('/administrator', "MenuController@home")->middleware('auth:administrator');
Route::get('/teacher', "MenuController@home")->middleware('auth:teacher');
Route::get('/student', "MenuController@home")->middleware('auth:student');

Route::get('/', 'MenuController@index')->middleware('guest');

//Route::group('', function(){
    Route::get('/menu/kategoriList','KategoriController@kategoriList');

//});

Route::get('/menu/kursus', 'MenuController@kursus')->middleware('guest');
Route::get('/menu/kontak', 'MenuController@kontak')->middleware('guest');
Route::get('/menu/tentang_kami', 'MenuController@tentangKami')->middleware('guest');


