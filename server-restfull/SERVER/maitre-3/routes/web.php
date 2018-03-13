<?php

/*
|--------------------------------------------------------------------------
| Web Routes
| FRONTEND
|--------------------------------------------------------------------------
| WEB APP
*/

Route::get('/','HomeController@Home')->name('fr-home')->middleware('IsTable:7');



Route::get('/login','HomeController@index')->name('login');
Route::post('/sign-in','HomeController@store')->name('account-sign-in');


/*
| COMMAND
*/
Route::get('/command-add/{code}/{amount}/{token}','CommandController@addCommand')->name('fr-command-add');
//Route::get('/command-list/{token}','CommandController@CommandList')->name('fr-command-list');
Route::get('/command-erase/{token}','CommandController@erase')->name('fr-command-erase');
Route::get('/command-send/{token}','CommandController@send')->name('fr-command-send');
//Route::get('/command-order-list/{token}','CommandController@orderList')->name('fr-command-orders');


Route::get('/mycommand','CommandController@myCommand')->name('fr-mycommand')->middleware('IsTable:7');
Route::get('/command-del/{id}/{token}','CommandController@destroy')->name('fr-command-destroy')->middleware('IsTable:7');





//401-frontend
Route::get('/401-frontend',function(){ return view('templates.401-frontend'); });





/*
|--------------------------------------------------------------------------
| BACKEND
|--------------------------------------------------------------------------
|
|
*/
Route::group(['middleware' => 'auth'], function () {
	
    Route::get('/logout',  function()
		{
			Auth::logout();
			Session::flush();
			return Redirect::to('/');
	})->name('logout');

    Route::get('/home','UserController@index')->name('ds-home');





    /*
    |	ACESSO RESTRITO
    |	ROOT, GERENCIA
    */
    Route::group(['middleware' => 'IsRoot'], function () {
	    /*
	    | USERS
	    |--------------------------------------------------------------------------
		| GETTERS
		*/
	    Route::get('/user','UserController@create')->name('ds-user-create');
		Route::get('/user-list','UserController@userlist')->name('ds-user-list');	
		Route::get('/user-del/{id}','UserController@destroy')->name('ds-user-del');	
		Route::get('/user-show/{id}','UserController@show')->name('ds-user-show');
		Route::get('/user-list-token','UserController@UserlistToken')->name('ds-user-list-token');

		/*
		| POSTTERS
		*/
		Route::post('/user-store','UserController@store')->name('ds-user-create-post');
		
		Route::post('/user-password','UserController@password')->name('ds-user-password-edit-post');

    });

	Route::get('/user-password/{id}','UserController@passwordEdit')->name('ds-user-password-edit');
	Route::post('/user-edit','UserController@edit')->name('ds-user-edit-post');





     /*
    | CATEGORY
    |--------------------------------------------------------------------------
	| GETTERS
	*/
	Route::get('/category','CategoryController@create')->name('ds-cate-create');		
	Route::get('/category-list','CategoryController@cateList')->name('ds-cate-list');
	Route::get('/category-del/{id}','CategoryController@destroy')->name('ds-cate-del');	
	Route::get('/category-show/{id}','CategoryController@show')->name('ds-cate-show');

	/*
	| POSTTERS
	*/
	Route::post('/category-store','CategoryController@store')->name('ds-cate-create-post');
	Route::post('/category-edit','CategoryController@edit')->name('ds-cate-edit-post');




	 /*
    | PRODUCTS
    |--------------------------------------------------------------------------
	| GETTERS
	*/
	Route::get('/product','ProductController@create')->name('ds-prod-create');
	Route::get('/product-list','ProductController@prodList')->name('ds-prod-list');
	Route::get('/product-del/{id}','ProductController@destroy')->name('ds-prod-del');
	Route::get('/product-show/{id}','ProductController@show')->name('ds-prod-show');

	/*
	| POSTTERS
	*/
	Route::post('/product-store','ProductController@store')->name('ds-prod-create-post');
	Route::post('/product-edit','ProductController@edit')->name('ds-prod-edit-post');



	

	/*
    |	ACESSO RESTRITO
    |	ROOT, GERENCIA
    */
    Route::group(['middleware' => 'IsRoot'], function () {

    	/*
	    | MENU,CARTE,CARD (CARDÁPIO)
	    |--------------------------------------------------------------------------
		| GETTERS
		*/
		Route::get('/menu','MenuController@create')->name('ds-menu-create');
		Route::get('/menu-list','MenuController@menuList')->name('ds-menu-list');	
		Route::get('/menu-show/{id}','MenuController@show')->name('ds-menu-show');
		Route::get('/menu-del/{id}','MenuController@destroy')->name('ds-menu-del');
		Route::get('/menu-search/{id}','MenuController@searchProduct')->name('ds-menu-search-prod');


		/*
		| POSTTERS
		*/
		Route::post('/menu-search','MenuController@store')->name('ds-menu-store');
		Route::post('/menu-edit','MenuController@edit')->name('ds-menu-edit-post');

	});



	/*
    |	ACESSO RESTRITO
    |	ROOT, GERENCIA
    */
    Route::group(['middleware' => 'IsRoot'], function () {

		/*
	    | MENU,CARTE,CARD (CARDÁPIO) TABLE
	    |--------------------------------------------------------------------------
		| GETTERS
		*/
		Route::get('/table','TableController@create')->name('ds-table-create');
		Route::get('/table-list','TableController@tableList')->name('ds-table-list');
		Route::get('/table-show/{id}','TableController@show')->name('ds-table-show');
		Route::get('/table-del/{id}','TableController@destroy')->name('ds-table-del');
		Route::get('/table-reserve/{token}','TableController@reserve')->name('ds-table-reserve');

		/*
		| POSTTERS
		*/
		Route::post('/menu-store','TableController@store')->name('ds-table-store');
		Route::post('/menu-edit','TableController@edit')->name('ds-table-edit-post');
		Route::post('/table-post','TableController@postReserve')->name('ds-table-reserve-post');


	});



	/*
    | KITCHEN
    |--------------------------------------------------------------------------
	| GETTERS
	*/
	Route::get('/kitchen','KitchenController@kitchenList')->name('ds-kitchen-list');
	Route::get('/kitchen-order/{id}/{token}','KitchenController@send')->name('ds-kitchen-order');


	/*
	| POSTTERS
	*/






	 /*
    | 401, 404
    |-------------------------------------------------------------------------- 
	*/
	Route::get('/401',function(){ return view('templates.401'); });
	Route::get('/404',function(){ return view('templates.404'); });


});
