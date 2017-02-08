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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/reviews', 'ReviewsController@index');
Route::get('/news', 'NewsController@index');
Route::get('/latest-trailers', 'TrailersController@index');
Route::get('/authors', 'AuthorController@index');
Route::get('/logout', 'LogoutController@index');

Route::get('/search_results', 'SearchController@index');
Route::post('/search_results', 'SearchController@postSearch');

Route::group(array(), function() {
    Route::resource('admin/news', 'Admin\AdminNewsController');
    Route::resource('admin/reviews', 'Admin\AdminReviewsController');
    Route::resource('admin/latest-trailers', 'Admin\AdminTrailersController');
    Route::resource('admin/authors', 'Admin\AdminAuthorsController');
    Route::resource('admin/comments', 'Admin\AdminCommentsController');
});
