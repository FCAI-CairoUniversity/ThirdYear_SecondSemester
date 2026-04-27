<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/**
 * Route::get($uri, $callback);
 * Route::post($uri, $callback);
 * Route::put($uri, $callback);
 * Route::patch($uri, $callback);
 * Route::delete($uri, $callback);
 * Route::options($uri, $callback);
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/there', function () {
    return view('redirect_example');
});

Route::redirect('/here', '/there');


/**
Route::match(['get', 'post'], '/', function () {
    // ...
});
 
Route::any('/', function () {
    // ...
});
 */

// Route::get('/user/{id}', function (string $id) {
//     return 'Details for User with ID: ' . $id;
// });

// Route::get('/user', function () {
//     return 'Details for all users';
// });

// Route::post('/user', function () {
//     return 'POST Request';
// });

// Route::put('/user', function () {
//     return 'PUT Request';
// });

// Route::delete('/user', function () {
//     return 'DELETE Request';
// });

//php artisan make:controller UserController --resource
//Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::resource('user', UserController::class);

Route::fallback(function () {
    return view('404');
});
