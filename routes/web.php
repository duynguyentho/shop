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
Route::view('special','home.special',['categories'=> App\Categories::inRandomOrder()->limit(6)->get(),'active' => 'special'])->name('special');
Route::view('menu','home.menu',['categories'=> App\Categories::orderBy('name')->get()->take(11),'active' => 'menu', 'products' => App\Products::orderBy('id')->get()->take(5)])->name('menu');
Route::get('/products','ProductsController@getproducts');
Route::get('/product/{id}','ProductsController@detail');
Route::get('/contact','ContactController@index')->name('contact');
Route::post('/add-cart','CartController@add');
Route::get('/cart','CartController@index');
Route::get('delete-item/{id}','CartController@deleteItem');