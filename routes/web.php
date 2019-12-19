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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/', 'ServicesController@index')->name('home');
Route::get('/services', 'ServicesController@showall')->name('services');
Route::get('/welcome', function () {
    return view('welcome2');
});
Route::get('/about',function() {
  return view('about');
})->name('about');
Route::get('/contact',function() {
  return view('contact');
})->name('contact');

Route::get('/login',function(){

  return view('login');
})->name('login');

Route::get('/register',function(){

  return view('register');
})->name('register');

Route::get('/invite/{id}',function(){

  return view('invite');
})->name('invite');

Route::get('/invitation',function(){

  return view('invitation');
})->name('invitation');
Route::get('/profile',function(){

  return view('profile');
})->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('test','AccountController@update');
