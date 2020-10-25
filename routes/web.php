<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AttributionController;


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

/*Route::get('/', function () {
    return view('connexion');
});*/

/*Route::get('/dashboard', function (){
  return view('dashboard');
});*/

Route::get('/', [ConnexionController::class, 'formulaire']);
Route::post('/connexion', [ConnexionController::class, 'traitement']);

Route::get('/inscription', [InscriptionController::class, 'formulaire']);
Route::post('/inscription', [InscriptionController::class, 'traitement']);

Route::get('/dashboard', [PosteController::class, 'formulaire'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::post('/dashboardpostes', [PosteController::class, 'traitement'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::get('/dashboard', [PosteController::class, 'liste'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::get('/dashboard', [PosteController::class, 'horaire'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::delete('postes/{id}/supprimerposte', 'PosteController@supprimerposte')->middleware('App\Http\Middleware\AuthMiddleware');

Route::get('/dashboard', [ClientController::class, 'formulaire'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::post('/dashboard', [ClientController::class, 'traitement'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::get('/dashboard', [ClientController::class, 'liste'])->middleware('App\Http\Middleware\AuthMiddleware');

Route::get('/dashboard', [AttributionController::class, 'formulaire'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::post('/dashboardatrribution', [AttributionController::class, 'traitement'])->middleware('App\Http\Middleware\AuthMiddleware');
Route::get('/dashboard', [AttributionController::class, 'liste'])->middleware('App\Http\Middleware\AuthMiddleware');
