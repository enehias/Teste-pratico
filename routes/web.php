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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home/', 'HomeController@index')->name('home');
Route::middleware(['isAuth'])->group(function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');


    Route::middleware(['isAdmin'])->prefix('veiculo/')->name('veiculos.')->group(function (){

        Route::get('listar/','VeiculoController@index')->name('listar');
        Route::get('cadastrar/','VeiculoController@create')->name('cadastrar');
        Route::post('cadastrar/','VeiculoController@store')->name('store');
        Route::get('cadastrar/{id}','VeiculoController@update')->name('editar');
        Route::post('cadastrar/{id}','VeiculoController@updated')->name('updated');
        Route::get('deletar/{id}','VeiculoController@destroy')->name('deletar');
    });



});
