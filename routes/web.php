<?php



Route::get('/','WebsiteController@index');
Route::get('/cart','CartController@index');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@store');

Route::post('/payment', 'PaymentController@payment');
Route::get('/success', 'PaymentController@success');
Route::get('/error', 'PaymentController@error');
Route::get('/cancel', 'PaymentController@cancel');

Route::get('/contact','ContactController@index');
Route::get('/products','ProductController@index');
Route::get('/product/{product}','ProductController@show');
Route::get('/blog','BlogController@index');
Route::get('/blog/{id}','BlogController@show');

Route::get('/products/category/{category}','ProductController@productByCategory');
Route::get('/products/subcategory/{subcategory}','ProductController@productBySubcategory');
Route::get('/products/color/{color}','ProductController@productByColor');
Route::get('/products/brand/{brand}', 'ProductController@productByBrand');
Route::get('/products', 'ProductController@search');

Route::post('/product/review/{product}','ReviewController@store');

Route::get('cart/add/{product}', 'CartController@addToCart');
Route::post('addtocart/{product}', 'CartController@cartAdd');
Route::get('cartitmes', 'CartController@cartItems');
Route::get('cartpage', 'CartController@cartpage');
Route::get('cart/update', 'CartController@cartUpdate');
Route::get('cart/remove/{rowid}', 'CartController@remove');




Auth::routes(['verify' => true]);



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth','author']], function(){

	 Route::get('/', 'AdminController@index');
	 Route::resource('products','ProductController');
	 Route::get('products/restore/{id}','ProductController@restore');
	 Route::post('products/forecdelete/{id}','ProductController@forecDelete');
	 Route::get('/subcategory/{id}','ProductController@subcategory');

	 Route::get('/orders', 'OrderController@index');
	 Route::get('/orders/{order}', 'OrderController@show');
	 Route::get('/orders/delivered/{order}', 'OrderController@delivered');



	// Route::get('/products', 'ProductController@index');

	// Route::get('/products/create', 'ProductController@create');
	// Route::post('/products', 'ProductController@store');

	// Route::get('/products/{id}', 'ProductController@show');

	// Route::get('/products/{id}/edit', 'ProductController@edit');
	// Route::put('/products/{id}', 'ProductController@update');


	// Route::delte('/products/{id}', 'ProductController@destroy');


});

Route::group(['prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth','customer','verified']], function(){

	Route::get('/', 'CustomerController@index');
	Route::get('/orders', 'CustomerController@orders');
	Route::get('/orders/{order}', 'CustomerController@show');
	Route::get('/setting', 'CustomerController@setting');
	Route::get('/profile', 'CustomerController@profile');
	Route::post('/profile/update', 'CustomerController@profileUpdate');
	Route::get('/logout', 'CustomerController@logout');
	

});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');



// View::composer('layouts.website',function($view){
// 	$user = App\User::first();
// 	$view->with('user',$user);
// });



