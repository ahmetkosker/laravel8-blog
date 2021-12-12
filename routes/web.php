<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Testt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth')->prefix('admin')->group(function () {
});

Route::get('test', function () {
    return view('profile.et');
});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/login', function (Request $request) {
        return view('auth.admin_login');
    })->name('admin_login');

    Route::post('/login', [AdminLoginController::class, 'login'])->name('ahmetbaba');

    Route::get('/panel', function (Request $request) {
        $user = $request->session()->get('user_id');
        return view('profile.admin_panel', ['user' => $user]);
    })->name('admin_panel');

    Route::get('/categories', [CategoryController::class, 'show'])->name('admin_panel_categories');

    Route::get('/category/add', [CategoryController::class, 'show_adding'])->name('adding category get');

    Route::post('/category/add', [CategoryController::class, 'adding_category'])->name('adding category post');
});





Route::get('/delete', function (Request $request) {
    $request->session()->flush();
    return '<h1>Logged Out</h1>';
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
