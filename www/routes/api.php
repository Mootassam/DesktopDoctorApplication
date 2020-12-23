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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', 'ApiController@login');
    Route::post('register', 'ApiController@register');
    Route::post('logout', 'ApiController@logout');
    Route::post('refresh', 'ApiController@refresh');
    Route::post('me', 'ApiController@me');

});



Route::apiresource('Patient', 'PatientController');
Route::get('counts', 'PatientController@counts');
Route::get('accuille', 'RendezController@accuille');
Route::apiresource('Doctor','DoctorController');
Route::apiresource('Rendez', 'RendezController');
Route::get('now', 'RendezController@now');


Route::post('fetch','PatientController@fetch');
Route::post('Rendez/fetch','RendezController@fetch');
Route::post('Doctor/fetch','DoctorController@fetch');



