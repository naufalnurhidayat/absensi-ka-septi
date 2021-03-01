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

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
	Route::get('/','HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');
Route::resource('/jabatan', 'JabatanController');
Route::resource('/pendidikan', 'PendidikanController');
Route::resource('/pegawai', 'PegawaiController');
Route::get('/PrintPdfAll','AbsenController@PDFall');
Route::get('/PrintPdf','AbsenController@PDFfilter');
Route::get('report_absen',function(){
	return view('report_absen');
});
Route::get('dashboard',function(){
	return view('dashboard');
});

});

Route::get('/absenadmin', 'AbsenController@index');
Route::post('/absen_admin', 'AbsenController@absen');
Route::get('/absenusers','LoginUsersController@index');
Route::post('/absen_users', 'LoginUsersController@absen');
