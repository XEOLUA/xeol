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

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Navigation;

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/lessons', 'HomeController@lessons')->name('lessons');

View::composer('home.header', function($view)
{
    $view->with('nav', Navigation::where('block_id',1)->orderBy('order')->get());
});

