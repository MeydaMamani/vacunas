<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () { return view('index'); });
// Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('/', [HomeController::class, 'index']);
Route::get('searchdoc/', [HomeController::class, 'searchDni']);
