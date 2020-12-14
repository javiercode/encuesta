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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();



Route::prefix('admin')->group(function (){
//    Route::resource('reporte', 'ReporteController');
    Route::get('pregunta.tipo', 'App\Http\Controllers\PreguntaController@getTipo');
    Route::get('pregunta', ['as' => 'admin.pregunta', 'uses'=>'App\Http\Controllers\HomeController@graficoPregunta']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::resource('encuesta', 'App\Http\Controllers\EncuestaController', ['except' => ['show']]);
    Route::resource('pregunta', 'App\Http\Controllers\PreguntaController', ['except' => ['show']]);
    Route::resource('opcion', 'App\Http\Controllers\OpcionController', ['except' => ['show']]);
    Route::delete('pregunta/delete', ['as' => 'pregunta.delete', 'uses'=>'App\Http\Controllers\PreguntaController@destroy']);
    Route::delete('opcion/delete', ['as' => 'opcion.delete', 'uses'=>'App\Http\Controllers\OpcionController@destroy']);
    Route::delete('encuesta/delete', ['as' => 'encuesta.delete', 'uses'=>'App\Http\Controllers\EncuestaController@destroy']);
});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');