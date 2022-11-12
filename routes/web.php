<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
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
// auto redirect page
Route::get('/', function () {
    return redirect('/arsip');
});

// About routes
Route::get('/about', function () {
    return view('about.index', ['title' => 'About']);
});

// Arsip routes
Route::resource('/arsip', ArsipController::class);
Route::delete('/arsip/{arsip:id}/delete', [ArsipController::class, 'destroy']);
Route::get('/arsip/{arsip:id}/view', [ArsipController::class, 'show']);
