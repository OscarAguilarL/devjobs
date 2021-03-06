<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

// Rutas Protegidas
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', 'VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', 'VacanteController@update')->name('vacantes.update');

    // Subir imágenes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');

    Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');

    // Notificaciones
    Route::get('/notificaciones', 'NotificationesController')->name('notificaciones');
});

// Página de inicio
Route::get('/', 'InicioController')->name('inicio');

// Categorias
Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');

// Enviar datos para una vacante
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');

// Muestra los trabajos en el frontend sin la autenticación
Route::post('/search', 'VacanteController@buscar')->name('vacante.buscar');
Route::get('/vacantes/search', 'VacanteController@resultados')->name('vacante.resultados');
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');
