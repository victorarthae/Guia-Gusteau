<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

Route::get('/receita/{id}', [
    'as' => 'receita', 'uses' => 'RecipeController@index'
]);

Route::get('/geladeira', [
    'as' => 'geladeira', 'uses' => 'FreezerController@index'
]);

Route::post('/geladeira/add', [
    'as' => 'geladeira-add', 'uses' => 'FreezerController@addIngredient'
]);

Route::get('/geladeira/del/{id}', [
    'as' => 'geladeira-del', 'uses' => 'FreezerController@delIngredient'
]);

Route::post('/pesquisa', [
    'as' => 'pesquisa', 'uses' => 'SearchController@index'
]);

Route::get('/pesquisa/geladeira', [
    'as' => 'pesquisa-geladeira', 'uses' => 'SearchController@searchFreezer'
]);

Route::get('/pesquisa/remove/{ids}/{id}', [
    'as' => 'pesquisa-remove-id-get', 'uses' => 'SearchController@removeIngredientId'
]);

Route::get('cadastro', [
    'as' => 'cadastro', 'uses' => 'RegisterController@index'
]);

Route::get('login', [
    'as' => 'login', 'uses' => 'LoginController@index'
]);

Route::get('logout', [
    'as' => 'logout', 'uses' => 'LogoutController@index'
]);

Route::post('cadastro', [
    'as' => 'cadastro', 'uses' => 'RegisterController@efetuaCad'
]);

Route::post('login', [
    'as' => 'login', 'uses' => 'LoginController@LoginUser'
]);

Route::post('rating', [
    'as' => 'rating', 'uses' => 'RatingController@index'
]);

Route::post('add-ingredient', [
    'as' => 'add-ingredient', 'uses' => 'SearchController@addIngredientInSearch'
]);


