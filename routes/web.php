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

/**
 * Basic
 */
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('reviews', 'ReviewsController@index');
Route::get('news', 'NewsController@index');
Route::get('latest-trailers', 'TrailersController@index');
Route::get('authors', 'AuthorController@index');
Route::get('logout', 'LogoutController@index');
Route::get('search_results', 'SearchController@index');
Route::post('search_results', 'SearchController@postSearch');
/**
 * Reviews
*/
Route::get('review/{review_id}', 'ReviewsController@getReview');
Route::post('review/{review_id}', 'ReviewsController@postComment');
Route::delete('review/{review_id}/{comment_id}', 'ReviewsController@destroy');
/**
 * News
 */
Route::get('news/{news_id}', 'NewsController@getNews');
Route::post('news/{news_id}', 'NewsController@postComment');
Route::delete('news/{news_id}/{comment_id}', 'NewsController@destroy');
/**
 * Trailers
 */
Route::get('latest-trailers/{trailer_id}', 'TrailersController@getTrailer');
Route::post('latest-trailers/{trailer_id}', 'TrailersController@postComment');
Route::delete('latest-trailers/{trailer_id}/{comment_id}', 'TrailersController@destroy');
/**
 * User Panel
 */
Route::get('user/{user_id}', 'UserController@index');
Route::post('user/{user_id}', 'UserController@edit');
/**
 * Admin Panel
 */
Route::group(array('middleware' => 'auth.admin'), function() {
    Route::resource('admin/news', 'Admin\AdminNewsController');
    Route::resource('admin/reviews', 'Admin\AdminReviewsController');
    Route::resource('admin/latest-trailers', 'Admin\AdminTrailersController');
    Route::resource('admin/authors', 'Admin\AdminAuthorsController');
});
