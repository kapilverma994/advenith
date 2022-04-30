<?php

use App\Http\Controllers\CategoryController;
use App\Post;
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
Route::get('/','FrontendController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::get('category/subcategory/ajax/{category_id}','SubcategoryController@GetSubCategory');
Route::resource('subcategory', 'SubcategoryController');
Route::resource('post','PostController');
