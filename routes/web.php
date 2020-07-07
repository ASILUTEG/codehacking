<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;
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

Route::get('/t', function () {
    $pass = Str::random(12);
    return $pass . '  ' . Hash::make($pass);
    // return GoogleTranslate::trans('ali yasser ali', 'ar', 'en');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/post/{id}', 'AdminPostController@post');
Route::resource('/lesson', 'lessoncontroller');
Auth::routes();
Route::resource('admin/post/comments', 'PostCommentsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/post/comment/replaies', 'commentreplaiesController');
Route::group(['middleware' => 'Admin'], function ($id) {
    Route::resource('Admin/user', 'AdminUserController');
    Route::resource('admin/post', 'AdminPostController');
    Route::resource('admin/catogery', 'AdminCatogeryController');
    Route::resource('admin/media', 'AdminMediaController');
});
