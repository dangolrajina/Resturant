 <?php
 
Route::get('/','HomeController@view');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about-us', 'HomeController@about');

Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

// For Admin Section Route
Route::prefix('admin')->group( function() {
	Route::get('/', 'AdminController@index')->name('admin.dashboard');


	// FOR ADMINS LISTS
	Route::get('/adminlist', 'AdminController@view');
	Route::get('/adminregister', 'AdminController@create');
	Route::post('/adminregister', 'AdminController@store');
	Route::delete('/delete_admins/{admin}','AdminController@destroy');

	// FOR CATEGORY
	Route::get('/categories', 'CategoryController@index');
	Route::post('/categories/add', 'CategoryController@store');

		// FOR Menu
	Route::get('/menu', 'MenuController@index');
	Route::get('/menu/add', 'MenuController@create');
	Route::post('/menu/add', 'MenuController@store');
	Route::get('/menu/edit/{menu}', 'MenuController@edit');
	Route::post('/menu/edit/{menu}', 'MenuController@update');
	Route::delete('/menu/delete/{menu}', 'MenuController@destroy');


	// For Reservation
	Route::get('/reservation', 'ReservationsController@index');
	//Route::post('/reservation/search','ReservationsController@search');


	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');

	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	// OWN PASSWORD RESET ROUTES DAMN
	
	// Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});