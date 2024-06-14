<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});


Route::post('/contact', [FuncController::class, 'contact']);

Route::get('/buy/{product}', [FuncController::class, 'buyProduct']);

Route::post('/subscribe', [FuncController::class, 'subscribe']);
