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

Route::get('/administrator', "HomeController@home")->middleware('auth:administrator');
Route::get('/teacher', "HomeController@home")->middleware('auth:teacher');
Route::get('/student', "HomeController@home")->middleware('auth:student');

Route::get('/', 'HomeController@index')->middleware('guest');

Route::group('/menu', function(){

    Route::get('/kategoriList','KategoriController@kategoriList');

});

Route::get('/kursus', function () {
    return view('kursus');
})->middleware('guest');

Route::get('/kontak', function () {
    return view('contact');
})->middleware('guest');

Route::get('/tentang_kami', function () {
    return view('tentang_kami');
})->middleware('guest');


