<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// New route for the question page
Route::get('/home', function () {
    return view('question');
});

Route::get('/letter', function () {
    return view('letter');
});

Route::get('/gallery', function () {
    return view('gallery');
});