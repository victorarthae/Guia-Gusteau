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

Route::post('/pesquisa', [
    'as' => 'pesquisa', 'uses' => 'SearchController@index'
]);

Route::get('cadastro', [
    'as' => 'cadastro', 'uses' => 'RegisterController@index'
]);

Route::post('cadastro', [
    'as' => 'cadastro', 'uses' => 'RegisterController@efetuaCad'
]);
