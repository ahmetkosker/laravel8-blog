<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Testt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ImageGalleryController;

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

Route::get('/test', function (Request $request) {
});

Route::get('/admin/login', function (Request $request) {
    return view('auth.admin_login');
})->name('admin_login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('ahmetbaba');

Route::get('/blogs', [BlogController::class, 'show']);

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/panel', function (Request $request) {
        $user = $request->session()->get('user_id');
        return view('profile.admin_panel', ['user' => $user]);
    })->name('admin_panel');

    Route::get('/categories', [CategoryController::class, 'show'])->name('admin_panel_categories');
    Route::get('/category/add', [CategoryController::class, 'show_adding'])->name('adding category get');
    Route::post('/category/add', [CategoryController::class, 'adding_category'])->name('adding category post');
    Route::get('/category/edit/{id}', [CategoryController::class, 'showing_edit'])->name('category edit get');
    Route::put('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category edit post');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('destroying a category');


    Route::prefix('blog')->group(function () {

        Route::get('/', [BlogController::class, 'index'])->name('showing blogs');
        Route::get('/add', [BlogController::class, 'show']);
        Route::post('/add', [BlogController::class, 'create']);
        Route::get('/edit/{id}', [BlogController::class, 'edit']);
        Route::put('/edit/{id}', [BlogController::class, 'update']);
        Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('destroying a blog');
        // Route::get('/', [BlogController::class], '');

    });

    Route::prefix('image')->group(function () {

        Route::get('/add/{id}', [ImageGalleryController::class, 'show'])->name('showing image gallery');
        Route::post('/store/{id}', [ImageGalleryController::class, 'store'])->name('adding a new image');
        Route::get('/edit/{id}', [ImageGalleryController::class, 'edit']);
        Route::put('/edit/{id}', [ImageGalleryController::class, 'update']);
        Route::delete('/delete/{blog_id}/{image_id}', [ImageGalleryController::class, 'destroy'])->name('destroying an image');
        // Route::get('/', [BlogController::class], '');

    });

    Route::get('/setting', [SettingController::class, 'index'])->name('showing setting');
    Route::put('/setting', [SettingController::class, 'update'])->name('updating setting');

});


Route::get('/delete', function (Request $request) {
    $request->session()->flush();
    return redirect()->intended('/admin/login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
