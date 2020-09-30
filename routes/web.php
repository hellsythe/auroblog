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

Route::middleware(['web', 'check.browser'])
->group(function(){
    Route::get('/', 'HomeController@BlogPosts')->name('posts');
    Route::get('/posts/{slug}', 'HomeController@blogPost')->name('post');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::prefix('admin')
->middleware(['web', 'auth'])
->namespace('Admin')
->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('/blog-posts' , 'BlogPostController');
});
