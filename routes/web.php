<?php

use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts/create', 'App\Http\Controllers\PostController@create');
Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');

// Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');

// Route::post('/posts/create','App\Http\Controllers\PostController@store')->name('post.store');
// Route::get('/posts/{post}','App\Http\Controllers\PostController@show')->name('post.show');
// Route::get('/posts/{post}/edit','App\Http\Controllers\PostController@edit')->name('post.edit');
// Route::patch('/posts/{post}','App\Http\Controllers\PostController@updatee')->name('post.updatee');
// Route::delete('/posts/{post}','App\Http\Controllers\PostController@destroy')->name('post.delete');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function (){
    Route::get('/posts', IndexController::class)->name('post.index');
    Route::get('/posts/create', CreateController::class)->name('post.create');
    Route::post('/posts', StoreController::class)->name('post.store');
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
    Route::delete('/posts/{post}', DestroyController::class)->name('post.delete');
});