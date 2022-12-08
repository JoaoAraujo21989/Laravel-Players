<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

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
Route::get('/file-import',[PlayerController::class,
    'importView'])->name('import-view');
Route::post('/import',[PlayerController::class,
    'import'])->name('import-players');
Route::get('/export-players',[PlayerController::class,
    'exportPlayers'])->name('export-players');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Exemplo 3 do pdf aula 4

Route::prefix('players')->group(function(){
    Route::get('', 'PlayerController@index');
    Route::get('create', 'PlayerController@create');
    Route::post('', 'PlayerController@store');
    Route::get('{player}', 'PlayerController@show');
    Route::get('{player}/edit', 'PlayerController@edit');
    Route::put('{player}', 'PlayerController@update');
    Route::delete('{player}', 'PlayerController@destroy');


// Auth Middleware
    Route::group(['middleware' => ['auth', 'isAdmin']], function () {
        Route::get('create', 'PlayerController@create');
        Route::post('', 'PlayerController@store');
        Route::get('{player}/edit', 'PlayerController@edit');
        Route::put('{player}', 'PlayerController@update');
        Route::delete('{player}', 'PlayerController@destroy');

    });
    Route::get('{player}', 'PlayerController@show');



});
