<?php

use Illuminate\Http\Request;
use App\Recipe;
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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});

Route::post('addrecipe', function(Request $request) {
    return $recipe = Recipe::create($request->all());
});

Route::get('showrecipe', function() {
    return $recipe = Recipe::all();
});

Route::delete('delete/{id}', function() {
    return $recipe = Recipe::find($id)->delete();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
