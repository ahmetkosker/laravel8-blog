<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Testt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;

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
    return view('MainPage');
});

Route::get('/login/admin', function (Request $request) {
    return view('test.test');
});

Route::post('/login/admin', [AdminLoginController::class, 'login']);

Route::get('/aPanel', function (Request $request) {
    $user = $request->session()->get('user_id');
    return view('test.test_login', ['user' => $user]);
})->middleware('auth');

Route::get('/delete', function (Request $request) {
    $request->session()->flush();
    return '<h1>Logged Out</h1>';
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
