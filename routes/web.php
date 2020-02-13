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

Route::post('/proses_login', 'LoginController@masuk');
Route::get('/proses_logout', 'LoginController@keluar');

Route::post('/proses_registrasi', 'RegistrasiController@registrasi');

Route::get('/administrator', "LoginController@home")->middleware('auth:administrator');
Route::get('/teacher', "LoginController@home")->middleware('auth:teacher');
Route::get('/student', "LoginController@home")->middleware('auth:student');

Route::get('/', 'MenuController@index')->middleware('guest');

Route::post('/dynamicDependent', 'MenuController@dynamicDependent')->middleware('guest');
Route::post('/getSubMapelList', 'PesanController@getMapelDynamic')->middleware('auth:student');


Route::get('/kursus', 'MenuController@kursus')->middleware('guest');
Route::get('/kontak', 'MenuController@kontak')->middleware('guest');
Route::get('/tentang_kami', 'MenuController@tentangKami')->middleware('guest');


//mapel

// mapel

Route::get('/menu/addMapelForm','MapelController@addMapelForm')->middleware('auth:administrator');
Route::post('/menu/addMapelProcess','MapelController@addMapelProcess')->middleware('auth:administrator');
Route::get('/mapel/{mapel_id}/delete','MapelController@deleteMapel')->middleware('auth:administrator');
Route::get('/menu/editMapelForm/{mapel_id}','MapelController@editMapelForm')->middleware('auth:administrator');
Route::post('/menu/editMapelProcess','MapelController@editMapelProcess')->middleware('auth:administrator');
Route::get('/menu/mapelList','MapelController@mapelList')->middleware('auth:administrator,student');
Route::get('/mapel/{mapel_id}/detail','MapelController@mapelStudentDetail')->middleware('auth:student');

//kategori
Route::get('/menu/kategoriList','KategoriController@kategoriList')->middleware('auth:administrator');
Route::get('/menu/addKategoriForm','KategoriController@addKategoriForm')->middleware('auth:administrator');
Route::post('/proses/addKategoriProcess','KategoriController@addKategoriProcess')->middleware('auth:administrator');
Route::get('/kategori/{kategori_id}/delete','KategoriController@deleteKategori')->middleware('auth:administrator');
Route::get('/menu/editKategoriForm/{id}','KategoriController@editKategoriForm')->middleware('auth:administrator');
Route::post('/menu/editKategoriProcess','KategoriController@editKategoriProcess')->middleware('auth:administrator');

//sub mapel
Route::get('/menu/subMapelList','SubMapelController@subMapelList')->middleware('auth:administrator');
Route::get('/menu/addSubMapelForm','SubMapelController@addSubMapelForm')->middleware('auth:administrator');
Route::post('/menu/addSubMapleProcess','SubMapelController@addSubMapleProcess')->middleware('auth:administrator');
Route::get('/subMapel/{sub_mapel_id}/delete','SubMapelController@deleteSubMapel');
Route::get('/menu/editSubMapelForm/{id}','SubMapelController@editSubMapelForm')->middleware('auth:administrator');
Route::post('/menu/editSubMapelProcess','SubMapelController@editSubMapelProcess')->middleware('auth:administrator');

//pemesanan
Route::get('/pesan/{mapel_id}/form','PesanController@formPemesananById')->middleware('auth:student');
Route::get('/menu/addPesananForm','PesanController@addPesananForm')->middleware('auth:student');
Route::post('/menu/addPemesananProcess','PesanController@addPemesananProcess')->middleware('auth:student');
Route::get('/menu/pesananSaya','PesanController@pesananSayaDetail')->middleware('auth:student,teacher');
Route::post('/getStatus','PesanController@getStatus')->middleware('auth:student,teacher');
Route::post('/addChat','PesanController@addChat')->middleware('auth:student,teacher');
Route::get('/menu/getPesananList','PesanController@getPesananList')->middleware('auth:teacher');
Route::get('/pesan/{transaksi_id}/detail','PesanController@pesananSayaTerimaDetail')->middleware('auth:teacher');
Route::get('/pesan/{transaksi_id}/terima','PesanController@terimaPesananProcess')->middleware('auth:teacher');
Route::get('/pesan/{transaksi_id}/batal/user','PesanController@cancelPesananUser')->middleware('auth:student');
Route::get('/pesan/{transaksi_id}/batal/teacher','PesanController@cancelPesananTecher')->middleware('auth:teacher');
Route::get('/pesan/{transaksi_id}/sampai/teacher','PesanController@sampaiPesananTecher')->middleware('auth:teacher');
Route::get('/pesan/{transaksi_id}/selesai/teacher','PesanController@selesaiPesananTecher')->middleware('auth:teacher');
Route::get('/cancelAlert','PesanController@cancelAlert')->middleware('auth:teacher');
Route::get('/menu/buatPesanan','MapelController@mapelList')->middleware('auth:student');
Route::get('/menu/riwayatList','PesanController@riwayatList')->middleware('auth:student,teacher');
Route::post('/changeProfile','LoginController@changeProfile')->middleware('auth:administrator,student,teacher');
Route::get('/profile','LoginController@profileDetail')->middleware('auth:administrator,student,teacher');

//user
Route::get('/menu/user/{level}','UserController@userList')->middleware('auth:administrator');

