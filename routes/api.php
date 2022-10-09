<?php

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

Route::get('/categories', 'Api\CategoryController@allCategories');

Route::get('/companies', 'Api\CompanyController@allCompanies');

Route::get('/services', 'Api\ServiceController@allServices');

Route::get('/pos', 'Api\PosController@allPos');

Route::get('/locations', 'Api\LocationController@allLocations');

Route::get('/counters_api', 'Api\CategoryController@allcounters');

Route::get('/cards_api', 'Api\CategoryController@allcards');

Route::post('/register', 'Api\UserController@register');

Route::post('/login', 'Api\UserController@login');
