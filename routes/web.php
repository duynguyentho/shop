<?php

use App\Categories;
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
    Route::match(['get', 'post'], 'register',['as' => 'register', 'uses' => 'AdminController@register']);
});
// Admin
Route::group(['prefix'=> '/admin', 'middleware'=>'auth'], function(){
    Route::get('/',function(){return view('welcome');});
    Route::get('/home','AdminController@index')->name('home');
    Route::get('logout','AdminController@logout')->name('logout');
    Route::resource('category',CategoriesController::class);
    Route::resource('product',ProductsController::class);
});
// Home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/special','SpecialController@index')->name('special');
Route::get('/menu','MenuController@index')->name('menu');
Route::get('/contact','ContactController@index')->name('contact');