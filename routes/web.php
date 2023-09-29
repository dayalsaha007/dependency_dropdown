<?php

use App\Http\Controllers\DropdownController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(DropdownController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/fetchstate', 'fetchstate')->name('fetchstate');
    Route::post('/fetchcity', 'fetchcity')->name('fetchcity');

});
