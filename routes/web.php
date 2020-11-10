<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index')->name('index');
Route::view('/about','about')->name('about');

Auth::routes();

// Admin Pages
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/admin/data/{status}','AdminController@data')->name('admin-data-user');
Route::get('/admin/data/{status}/{year_id}','AdminController@data')->name('admin-data-user-selective');
Route::get('/admin/create','AdminController@create')->name('admin-create-user');
Route::post('/admin/store','AdminController@store')->name('admin-store-user');
Route::get('/admin/edit/{id}','AdminController@edit')->name('admin-edit-user');
Route::patch('/admin/update/{id}','AdminController@update')->name('admin-update-user');
Route::delete('/admin/delete/{id}','AdminController@destroy')->name('admin-delete-user');

//Admin Pendataan Overview
Route::get('/pendataan/{year}','AdminController@pdf')->name('pdf');
Route::get('/pdf/viewAll/{year}','PDFController@viewPDF')->name('view-all');
Route::get('/pdf/viewDiterima/{year}','PDFController@viewDiterima')->name('view-diterima');
Route::get('/pdf/viewDitolak/{year}','PDFController@viewDitolak')->name('view-ditolak');
Route::get('/pdf/{year}','PDFController@downloadPDF')->name('download-pdf');
Route::get('/pdf/diterima/{year}','PDFController@diterimaPDF')->name('diterima-pdf');
Route::get('/pdf/ditolak/{year}','PDFController@ditolakPDF')->name('ditolak-pdf');

//Admin Biodata
Route::get('/admin/biodata/{id}','AdminController@biodata')->name('admin-biodata');
Route::get('/admin/biodata/create/{id}','AdminController@createbio')->name('admin-create-biodata');
Route::post('/admin/biodata/store/{id}','AdminController@storebio')->name('admin-store-biodata');
Route::get('/admin/biodata/edit/{id}','AdminController@editbio')->name('admin-edit-biodata');
Route::patch('/admin/biodata/update/{id}','AdminController@updatebio')->name('admin-update-biodata');
Route::delete('/admin/biodata/delete/{id}','AdminController@destroybio')->name('admin-delete-biodata');

//Admin Tes
Route::get('/admin/tes/{id}','TesController@index')->name('admin-tes');
Route::get('/admin/tes/edit/{id}','TesController@edit')->name('admin-edit-tes');
Route::patch('/admin/tes/update/{id}','TesController@update')->name('admin-update-tes');

// User Pages
Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/biodata/{id}','UserController@biodata')->name('user-biodata');
Route::get('/user/create','UserController@create')->name('user-create-biodata');
Route::post('/user/store','UserController@store')->name('user-store-biodata');
Route::get('/user/edit','UserController@edit')->name('user-edit-biodata');
Route::patch('/user/update{id}','UserController@update')->name('user-update-biodata');
Route::get('/user/kartu','UserController@tes')->name('kartu');
Route::get('/user/hasiltes','UserController@hasiltes')->name('hasil-tes');
Route::get('/user/surat/{who}','PDFController@suratPDF')->name('surat-pernyataan');
Route::get('/user/pdf','PDFController@cardPDF')->name('user-pdf');

//Academic year
Route::get('/academic','AcademicController@index')->name('academic');
Route::post('/academic','AcademicController@store')->name('academic-store');
Route::post('/academic/save','AcademicController@save')->name('academic-save');
Route::delete('/academic','AcademicController@delete')->name('academic-delete');

// Change Password
Route::get('/change','ChangePassController@index')->name('change');
Route::post('/change','ChangePassController@store')->name('change-pass');