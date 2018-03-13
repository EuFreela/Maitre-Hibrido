<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| TABLES
|--------------------------------------------------------------------------
*/
Route::middleware('api')->get("/menu/{table_token}", "APIController@getMenu");




/*
|--------------------------------------------------------------------------
| COMMAND
|--------------------------------------------------------------------------
*/
Route::middleware('api')->get("/command-add/{code}/{amount}/{token}", "APIController@addCommand");
Route::middleware('api')->get("/command-list/{token}", "APIController@getCommand");
Route::middleware('api')->get("/command-send/{token}", "APIController@sendCommand");
Route::middleware('api')->get("/command-del/{id}/{token}", "APIController@destroyItemCommand");
