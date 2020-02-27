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
Route::get('vue',function() {
  return view('welcome2');
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
Route::get('/seller/services/','VendorController@services')->name('seller.services');
//update Status
Route::post('/seller/invitation','VendorController@update');

//Routes to create,edit and delete
Route::get('/seller/services/new','ServicesController@create')->name('seller.create_service');
//Route::get('/seller/{service}/show','ServicesController@show')->name('seller.show_service');
Route::get('/seller/{service}/edit','ServicesController@edit')->name('seller.edit_service');
Route::get('/seller/{service}/delete','ServicesController@destroy')->name('seller.delete_service');
Route::post('/seller/services/new','ServicesController@store')->name('seller.service.create');
Route::put('/seller/{service}/update','ServicesController@update')->name('seller.service.update');


//Routes for the admin user
Route::get('/admin','AdminController@index')->name('admin.index');
Route::get('/admin/payments','AdminController@payments')->name('admin.payments');
Route::get('/admin/services','AdminController@services')->name('admin.services');
Route::get('/admin/events','AdminController@events')->name('admin.events');
Route::get('/admin/reports','AdminController@reports')->name('admin.reports');
Route::get('/admin/invitations','AdminController@invitations')->name('admin.invitations');

//ADMIN CRUD ROUTES
Route::get('/admin/{user}/view','UserController@view')->name('admin.user.view');
Route::get('/admin/{user}/edit','UserController@edit')->name('admin.user.edit');
Route::get('/admin/{user}/remove','UserController@destroy')->name('admin.user.delete');
Route::put('/admin/{user}/update','UserController@updateByAdmin')->name('admin.user.update');

//Admin Payment routes
Route::get('/admin/payment/{payment}/remove','PaymentController@destroy')->name('admin.payments.delete');

//Admion Invitation Routes
Route::put('/admin/invitation/{invitation}/update','InvitationController@updateStatus')->name('admin.invitation.update');
Route::get('/admin/invitation/{invitation}/remove','InvitationController@destroy')->name('admin.invitation.delete');
//ROUTE TO ADMIN SERVICE MANAGEMENT
Route::get('/admin/services/{service}/view','ServicesController@adminView')->name('admin.service.edit');
Route::put('/admin/services/{service}/update','ServicesController@adminUpdate')->name('admin.service.update');
Route::get('/admin/services/{service}/remove','ServicesController@destroyByAdmin')->name('admin.service.delete');

//Admin Event Routes
Route::get('/admin/events/{event}','EventController@adminShow')->name('admin.events.index');
Route::get('/admin/events/{event}/edit','EventController@adminEdit')->name('admin.events.edit');
Route::get('/admin/events/{event}/remove','EventController@destroy')->name('admin.events.delete');
Route::put('/admin/events/{event}/update','EventController@update')->name('admin.events.update');

//Authentication routes
Auth::routes();

Route::post('/event', 'EventController@store')->name('event.create');
Route::get('post-event', 'EventController@create')->middleware('auth')->name('post-event');
Route::get('event/{event}','EventController@show');
Route::get('event/{event}/edit','EventController@edit');
Route::put('event/{event}','EventController@update')->name('event.update');
Route::delete('event/{event}','EventController@destroy');
Route::put('/user', 'UserController@update');
