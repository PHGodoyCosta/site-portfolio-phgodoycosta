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
    return view('projects/temdebom');
});

Route::get("/code-company", function() {
    return view('projects/code-company');
});

Route::get("/site-portfolio", function() {
    return view('projects/site-portfolio');
});

