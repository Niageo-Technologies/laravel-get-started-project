<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
  Route::post('register', 'AuthController@register');
  Route::post('login', 'AuthController@login');

  Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/logout', 'AuthController@logout');
  });
});

//Backend (/admin prefix)
Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 

  Route::get('/permissions/search/{name}', 'PermissionController@search')->name('permissions.search'); 
  Route::apiResource('permissions', 'PermissionController'); 

  Route::get('/roles/search/{name}', 'RoleController@search')->name('roles.search'); 
  Route::apiResource('roles', 'RoleController'); 

  Route::get('/users/search/{title}', 'UserController@search')->name('users.search'); 
  Route::apiResource('users', 'UserController'); 
});

//Frontend (no /admin prefix)
Route::group([ 'namespace'=> '\App\Http\Controllers\Api', 'prefix' => '',  'as'=>'', 'middleware' => ['auth:api']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/sets/search/{title}', 'SetController@search')->name('sets.search'); 
  Route::apiResource('sets', 'SetController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/players/search/{title}', 'PlayerController@search')->name('players.search'); 
  Route::apiResource('players', 'PlayerController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/player-has-attributes/search/{title}', 'PlayerHasAttributeController@search')->name('player-has-attributes.search'); 
  Route::apiResource('player-has-attributes', 'PlayerHasAttributeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/attributes/search/{title}', 'AttributeController@search')->name('attributes.search'); 
  Route::apiResource('attributes', 'AttributeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/services/search/{title}', 'ServiceController@search')->name('services.search'); 
  Route::apiResource('services', 'ServiceController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/games/search/{title}', 'GameController@search')->name('games.search'); 
  Route::apiResource('games', 'GameController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/points/search/{title}', 'PointController@search')->name('points.search'); 
  Route::apiResource('points', 'PointController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => ['auth:api']], function () { 
  Route::get('/balls/search/{title}', 'BallController@search')->name('balls.search'); 
  Route::apiResource('balls', 'BallController'); 
});