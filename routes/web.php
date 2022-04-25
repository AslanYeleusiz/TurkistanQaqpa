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

Route::get('/', 'MainController@allData')->name('layout');
Route::get('/home', 'MainController@allData')->name('layout');
Route::get('/page-{id}', 'MainController@setPage')->name('setPage');

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/addgates', function () {
    return view('/adminLayout/adminPanel');
})->name('adminPanel')->middleware('auth');

Route::get('/filter', function () {
    return view('/filter');
})->name('filter');

Route::get('/filter/from-{start}-to-{finish}', 'MainController@filter')->name('filterEnt');

Route::get('/addgates/item-number-{id}', 'MainController@setItem')->name('setItem')->middleware('auth');

Route::post('/addgates/item-number-{id}/submit', 'MainController@redact')->name('redact-form-id')->middleware('auth');

Route::get('/addgates/item-number-{id}/delete', 'MainController@deleteItem')->name('delete-form-id')->middleware('auth');

Route::post('/addgates/submit', 'MainController@submit')->name('qaqpa-form')->middleware('auth');

Auth::routes();

//REGISTER USERS
//Route::get('/create-command', function () {
//    return view('/auth/register');
//});





