<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
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
Route::get('/post/{id}', 'AdminPostController@post');
Auth::routes();
Route::resource('admin/post/comments', 'PostCommentsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/post/comment/replaies', 'commentreplaiesController');
Route::group(['middleware' => 'Admin'], function ($id) {
    Route::resource('Admin/user', 'AdminUserController');
    Route::resource('admin/post', 'AdminPostController');
    Route::resource('admin/catogery', 'AdminCatogeryController');
    Route::resource('admin/media', 'AdminMediaController');

    Route::resource('admin/post/comment/replaies', 'commentreplaiesController');
});
