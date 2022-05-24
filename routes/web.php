<?php

use App\Http\Controllers\Events;
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

Route::get('/', [Events::class, 'events']);
Route::get('/event/{id}', [Events::class, 'event']);
Route::get('/update/{id}', [Events::class, 'showupdate']);
Route::get('/add', [Events::class, 'showadd']);
Route::get('/aboutus', [Events::class, 'aboutus']);
Route::get('/contacts', [Events::class, 'contacts']);

Route::post('/add', [Events::class, 'add']);
Route::post('/delete', [Events::class, 'delete']);
Route::post('/update/{id}', [Events::class, 'update']);
Route::post('/registerevent', [Events::class, 'registerUser']);

Auth::routes();
