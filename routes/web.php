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
//Admin routes for voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//this is a home route
Route::get('/', 'ServicesController@index')->name('home');
//this is route that returns services page
Route::get('/services/{category?}','ServicesController@showall')->name('services');
//Route to return about page
Route::get('/about',function() {
  return view('about');
})->name('about');
//Route to return contact page
Route::get('/contact',function() {
  return view('contact');
})->name('contact');

//Route to show login form
Route::get('/login','Auth.LoginController@showLoginForm')->name('login');
//Route to register
Route::get('/register',function(){

  return view('register');
})->name('register');
//Route to invite
Route::get('/invite/{id}', 'InvitationController@create')->middleware('auth')->name('invite');
//post route to invite
Route::post('/invite', 'InvitationController@store')->name('invite.create');
//route to show invitation page
Route::get('/invitation',function(){

  return view('invitation');
})->name('invitation');


//Route to Dashboard
Route::get('/dashboard', function(){
  return view('frontend.dashboard');
})->name('frontend.dashboard');
//Route to show profile
Route::get('/profile',function(){

  return view('profile');
})->name('profile');
//Authentication routes
Auth::routes();
//Route to landing page
Route::get('/home', 'HomeController@index')->name('home');
//Test route
Route::get('test','AccountController@update');
//Route to post an event
Route::get('post-event', function(){
  return "Hallo I will be posting evnt here";
})->name('post-event');
