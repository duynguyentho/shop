<?php

use App\Http\Controllers\AdminController;
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

Route::group(['middleware'=>'guest'], function(){
    Route::match(['get', 'post'], 'login',['as' => 'login', 'uses' => 'AdminController@login']);
    Route::any('/', 'AdminController@login');
});
Route::group(['prefix'=> '/admin', 'middleware'=>'auth'], function(){
    Route::get('/',function(){return view('welcome');});
    Route::get('/home','AdminController@index')->name('home');
    Route::get('logout','AdminController@logout')->name('logout');
    Route::resource('/category','CategoriesController');
    Route::get('/deleteChecked','CategoriesController@deleteChecked');
});
