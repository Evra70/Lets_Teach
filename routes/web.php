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

Route::get('/administrator', "LoginController@home")->middleware('auth:administrator');
Route::get('/teacher', "LoginController@home")->middleware('auth:teacher');
Route::get('/student', "LoginController@home")->middleware('auth:student');

Route::get('/', 'MenuController@index')->middleware('guest');


Route::get('/menu/kategoriList','KategoriController@kategoriList')->middleware('auth:administrator');
Route::get('/menu/addKategoriForm','KategoriController@addKategoriForm')->middleware('auth:administrator');
Route::post('/proses/addKategoriProcess','KategoriController@addKategoriProcess')->middleware('auth:administrator');
Route::get('/kategori/{kategori_id}/delete','KategoriController@deleteKategori')->middleware('auth:administrator');


Route::get('/menu/kategoriList','KategoriController@kategoriList')->middleware('auth:administrator');
Route::get('/menu/mapelList','MapelController@mapelList')->middleware('auth:administrator');




Route::get('/kursus', 'MenuController@kursus')->middleware('guest');
Route::get('/kontak', 'MenuController@kontak')->middleware('guest');
Route::get('/tentang_kami', 'MenuController@tentangKami')->middleware('guest');

//mapel
Route::get('/menu/addMapelForm','MapelController@addMapelForm')->middleware('auth:administrator');
Route::get('/mapel/{mapel_id}/delete','MapelController@deleteMapel')->middleware('auth:administrator');

//sub mapel
Route::get('/menu/subMapelList','SubMapelController@subMapelList')->middleware('auth:administrator');
//Route::get('/subMapel/{sub_mapel_id}/delete','SubMapelController@delete');
