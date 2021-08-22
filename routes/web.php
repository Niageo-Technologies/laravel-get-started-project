<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Backend : Admin Panel
Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 

  Route::get('/', function () {
    return redirect(route('admin.dashboard'));
  });
  
  //naming convention ignored for dashboard as /admin/dashboards sounds inappropriate!
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 
  
  Route::resource('products', 'ProductController'); 
  Route::resource('permissions', 'PermissionController'); 
  Route::resource('roles', 'RoleController'); 
  Route::resource('users', 'UserController'); 

});

//Frontend
Route::group([ 'namespace'=> '\App\Http\Controllers', 'prefix' => '',  'as'=>'', 'middleware' => 'auth' ], function () { 
  Route::resource('products', 'ProductController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('sets', 'SetController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('players', 'PlayerController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('player-has-attributes', 'PlayerHasAttributeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('attributes', 'AttributeController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('services', 'ServiceController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('games', 'GameController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('points', 'PointController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('balls', 'BallController'); 
});