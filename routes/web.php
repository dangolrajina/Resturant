 <?php
 
Route::get('/','HomeController@view');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about-us', 'HomeController@about');


Route::get('/menu','HomeController@menu');

Route::match(['get','post'],'/add-cart','MenuController@addtoorder');
Route::match(['get','post'],'/cart','MenuController@cart');
Route::get('/cart/update-quantity/{id}/{quantity}','MenuController@updateCartquantity');
Route::get('/cart/delete-cart/{id}','MenuController@deletecartproduct');

Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@store');

Route::get('/reservations','ReservationsController@viewReservation');
Route::post('/reservations', 'ReservationsController@store');


Route::get('/menu/{category}','HomeController@menu');
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

//Checkout//
Route::match(['get','post'],'/checkout','MenuController@checkout');
Route::match(['get','post'],'/order-review','MenuController@orderReview');

Route::match(['get','post'],'/place-order','MenuController@placeOrder');
Route::get('/thanks','MenuController@thanks');

// ADMIN KO LAGI
Route::prefix('admin')->middleware(['auth','admin'])->name('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	// USER KO LAGI
	Route::get('/user', 'UserController@index');
	Route::get('/user/{user}','UserController@show');
	Route::patch('/user/{user}','UserController@update');
	// // FOR CATEGORY
	Route::get('/categories', 'CategoryController@index');
	Route::post('/categories/add', 'CategoryController@store');

		// FOR Menu
	Route::get('/menu', 'MenuController@index');
	Route::get('/menu/add', 'MenuController@create');
	Route::post('/menu/add', 'MenuController@store');
	Route::get('/menu/edit/{menu}', 'MenuController@edit');
	Route::post('/menu/edit/{menu}', 'MenuController@update');
	Route::delete('/menu/delete/{menu}', 'MenuController@destroy');

	//For Order
	Route::get('/order','MenuController@viewOrder');



	// For Reservation
	Route::get('/reservation', 'ReservationsController@index');
	//Route::post('/reservation/search','ReservationsController@search');
	Route::get('/table', 'ReservationsController@table');

	Route::get('/contact','ContactController@view');


});
Route::get('/{category}','HomeController@view');