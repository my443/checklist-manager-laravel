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

Route::get('/', function () {
    return view('welcome');
});

// Masterlist
Route::resource('masterlist', 'MasterListController');

// To show the items filtered by the list.
//Route::get('template', 'ListTemplateItemsController@index')->name('id');
Route::resource('template', 'ListTemplateItemsController');


Route::get('used', 'UsedChecklistsController@index');
