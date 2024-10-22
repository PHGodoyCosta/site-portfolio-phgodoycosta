<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get("/blog", function() {
    return view('blog');
});

Route::get("/temdebom", function() {
    return view('temdebom');
});

Route::get("/code-company", function() {
    return view('code-company');
});

Route::get("/code-company", function() {
    return view('code-company');
});

