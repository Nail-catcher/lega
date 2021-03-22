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
})->name('welcome');

Route::get('roots', function () {
    return view('layouts.part.roots');
});
Route::get('/event','NewsController@event')->name('event');
Route::get('/event/{news}','NewsController@eventshow')->name('event.show');
Route::get('/catalog/category/{slug}', 'CatalogController@category')->name('catalog.category');
Route::get('/catalog/undercategory/{slug}', 'CatalogController@undercategory')->name('catalog.undercategory');
Route::get('admin', 'DashboardController@index')->name('admin');
Route::resource('/order', 'OrderController', ['names' => [
'index'=>'order',

]]);
Route::resource('/category', 'CategoryController', ['names' => [
    'index'=>'category',
    'create' => 'category.build',
    'edit' => 'category.edit',
    'show' => 'category.show',
    'del' => 'category.des',
]]);
Route::resource('/news', 'NewsController', ['names' => [
    'index'=>'news',
    'create' => 'news.build',
    'edit' => 'news.edit',
    'show' => 'news.show',
    'del' => 'news.des',
]]);
Route::resource('/undercategory', 'UndercategoriesController', ['names' => [
    'index'=>'undercategory',
    'create' => 'undercategory.build',
    'edit' => 'undercategory.edit',
    'show' => 'undercategory.show',
    'del' => 'undercategory.des',
]]);
Route::resource('/eat', 'EatController', ['names' => [
    'index'=>'eat',
    'create' => 'eat.build',
    'edit' => 'eat.edit',]]);
Route::resource('/path_eat', 'PathEatController', ['names' => [
    'index'=>'path_eat',
    'create' => 'path_eat.build',
    'edit' => 'path_eat.edit',]]);
Auth::routes();
Route::middleware('auth')->group(function () {

Route::resource('/lk', 'LkController', ['names' => [
    'index'=>'lk',
    ]]);
Route::get('/basket/index', 'BasketController@index')->name('basket.index');
});
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');
Route::post('/basket/add/{id}', 'BasketController@add')
    ->where('id', '[0-9]+')
    ->name('basket.add');
Route::post('/basket/plus/{id}', 'BasketController@plus')
    ->where('id', '[0-9]+')
    ->name('basket.plus');
Route::post('/basket/minus/{id}', 'BasketController@minus')
    ->where('id', '[0-9]+')
    ->name('basket.minus');
Route::post('/basket/ordercreate', 'BasketController@ordercreate')->name('basket.ordercreate');
Route::post('/pizzacreate', 'PizzaController@store')->name('pizza.create');
Route::get('/pizzadelete', 'PizzaController@destroy')->name('pizza.destroy');
