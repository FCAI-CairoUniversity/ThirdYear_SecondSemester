<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alpha', function () {
    return view('alpha');
});

Route::get('/beta', function () {
    return view('beta');
});
