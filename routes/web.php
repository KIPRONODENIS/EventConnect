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
Route::get('/invite/{id}/{new?}', 'InvitationController@create')->middleware('auth')->name('invite');
//post route to invite
Route::post('/invite', 'InvitationController@store')->name('invite.create');
//route to show invitation page
Route::get('/invitation',function(){

  return view('invitation');
})->name('invitation');


//Route to Dashboard
Route::get('/dashboard', function(){
 if(auth()->user()->hasRole('Vendor')) {
   return redirect('/seller');
 }
  return view('frontend.dashboard');
});
//Route to show profile
Route::get('/profile',function(){

  return view('profile');
})->name('profile');

// //Route to landing page
// Route::get('/home', 'HomeController@index')->name('home');
//Route to landing page
Route::get('/home/{name?}', 'Frontend\DashboardController@main')->name('frontend.dashboard')->middleware('auth');
//Test route
Route::get('test','AccountController@update');
//Route to post an event

//route to view each service
Route::get('/view/{service}', 'ServicesController@view')->name('view')->middleware('auth');
//route to contact each user
Route::get('/contact/{service}', 'UserController@contact')->name('contactuser');
Route::get('/seller','VendorController@index')->middleware('auth');
//route to see invitation
Route::get('/seller/invitation/{invitation}','VendorController@invitation');
//route to see order
Route::get('/seller/services/','VendorController@services');
//Authentication routes
Auth::routes();

Route::post('/event', 'EventController@store')->name('event.create');
Route::get('post-event', 'EventController@create')->middleware('auth')->name('post-event');
Route::get('event/{event}','EventController@show');
Route::get('event/{event}/edit','EventController@edit');
Route::put('event/{event}','EventController@update')->name('event.update');
Route::delete('event/{event}','EventController@destroy');
Route::put('/user', 'UserController@update');
