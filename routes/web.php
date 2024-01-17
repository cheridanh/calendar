<?php

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;
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
    return view('app');
})->name('app_home');

Route::get('/confirm', function () {
    return view('confirm');
})->name('app_confirm');

Route::get('/management', function () {
   return view('management');
})->name('app_management');

Route::get('/test', function () {
    dd ( Calendar::find(1) );
});
