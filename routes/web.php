<?php

use App\Http\Controllers\CategoryController;

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

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::group([
    'prefix' => 'home',
], function () {
    Route::get('/', [
        'uses' => 'CategoryController@index'
    ]);
    Route::post('/create', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);
    Route::get('/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::put('/update/{id}', [
        'uses' => 'CategoryController@store',
        'as' => 'category.update'
    ]);
    Route::delete('/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);
    Route::delete('/delete-all', [
        'uses' => 'CategoryController@destroyAll',
    ]);
});