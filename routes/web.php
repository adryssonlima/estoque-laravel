<?php

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

Route::get('/', 'HomeController@index');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::controllers([
    'auth' => 'Auth/LoginController',//AuthController',
    //'password' => 'Auth/ForgotPasswordController'//PasswordController',
]);

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::match(['post'], '/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');;
Route::get('/produtos/alterar/{id}', 'ProdutoController@alterar')->where('id', '[0-9]+');;
Route::match(['post'], '/produtos/update', 'ProdutoController@update');
