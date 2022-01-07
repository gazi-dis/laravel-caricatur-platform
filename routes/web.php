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

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/iletisim', 'FrontendController@contactIndex')->name('frontend.contact-index');
Route::get('/loadmoredata/{id}' , 'FrontendController@loadmoredata');
Auth::routes([
    'register' => false,
    'verify' => false,
]);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/' , 'AdminController@index')->name('admin.index');
        Route::get('/profil' , 'AdminController@profilIndex')->name('admin.profil');
        Route::post('/profile-update' , 'AdminController@profileUpdate');
        Route::get('/settings' , 'AdminController@settingsIndex')->name('admin.settings');
        Route::post('/settings-update' , 'AdminController@settingsUpdate');
        Route::get('/posts' , 'AdminController@postsIndex')->name('admin.posts');
        Route::post('/add-post' , 'AdminController@addPost');
        Route::get('/update-post/{id}' , 'AdminController@updatePostIndex');
        Route::post('/update-post/{id}' , 'AdminController@updatePost');
        Route::get('/delete-post/{id}' , 'AdminController@deletePost');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
