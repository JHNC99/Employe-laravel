<?php

use App\Movie;
use Illuminate\Http\Request;

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
//Get all Movies

Route::get('movies','MovieController@getMovie');
Route::get('movies/{id}','MovieController@getMovieID');
Route::post('movies','MovieController@addMovie');
Route::put('movies/{id}','MovieController@updateMovie');
Route::delete('movies/{id}','MovieController@deleteMovie');

Route::get('employes','EmployeController@getEmploye');
Route::get('employes/{id}','EmployeController@getEmployeID');
Route::post('employes','EmployeController@addEmploye');
Route::put('employes/{id}','EmployeController@updateEmploye');
Route::delete('employes/{id}','EmployeController@deleteEmploye');
