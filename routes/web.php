<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});


Route::get('/hellotest', function () {
    return 'Hello World test';
})->name('hellotest');

Route::get('/hellodirect', function () {
    return redirect()->route('hellotest');
});

Route::get('/hello/{name}/{umur}', function ($name, $umur) {
    return 'Hello ' . $name . ' umur ' . $umur;
});


// Ini adalah untuk menangkap semua route yang tidak ada
Route::fallback(function () {
    return 'fall back';
});
