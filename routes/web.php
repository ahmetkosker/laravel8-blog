<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Testt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\UserController;

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


Route::get('/', [HomeController::class, 'mainPage'])->name('home');

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/fag', [HomeController::class, 'fag'])->name('fag');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contactForm', [HomeController::class, 'contactForm'])->name('contact form');
Route::get('/categoryBlogs/{id}', [HomeController::class, 'categoryProduct'])->name('Category Product');
Route::get('/categoryBlogs/{id}/{slug}', [BlogController::class, 'single_blog'])->name('Single Blog');

Route::prefix('user')->group(function () {

    Route::get('profile', [HomeController::class, 'fix'])->name('fix');
    Route::get('/myaccount', [HomeController::class, 'myaccount'])->name('myaccount');
    Route::prefix('{user_id}/mycomments')->group(function () {
        Route::get('/', [HomeController::class, 'mycomments'])->name('mycomments');
        Route::post('/add/{id}', [BlogController::class, 'saving_Comment'])->name('Saving Comment');
        Route::get('/edit/{id}', [HomeController::class, 'mycomments_edit'])->name('mycomments_edit');
        Route::post('/update/{id}', [HomeController::class, 'mycomments_update'])->name('mycomments_update');
        Route::delete('/delete/{id}', [HomeController::class, 'mycomments_delete'])->name('mycomments_delete');
    });

    Route::prefix('/{user_id}/myblogs')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user showing blog');
        Route::get('/add', [UserController::class, 'show'])->name('user adding blog');
        Route::post('/add', [UserController::class, 'create'])->name('user creating blog');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user editing blog');;
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('user updating blog');;
        Route::delete('/blog/delete/{id}', [UserController::class, 'destroy'])->name('user destroying blog');
    });

    Route::prefix('{user_id}/image')->group(function () {

        Route::get('/add/{id}', [ImageGalleryController::class, 'user_show'])->name('user showing image gallery');
        Route::post('/store/{id}', [ImageGalleryController::class, 'user_store'])->name('user adding a new image');
        Route::delete('/delete/{blog_id}/{image_id}', [ImageGalleryController::class, 'user_destroy'])->name('user destroying image');
        // Route::get('/', [BlogController::class], '');

    });

    Route::prefix('{user_id}/mymessages')->group(function () {
        Route::get('/', [UserController::class, 'user_messages'])->name('user showing messages');
        Route::get('/delete/{id}', [UserController::class, 'user_destroy_message'])->name('user destroying message');
    });
});

// Route::get('/admin/login', function (Request $request) {
//     return view('auth.admin_login');
// })->name('admin_login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('ahmetbaba');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::middleware('admin')->group(function () {
        Route::get('/panel', function (Request $request) {
            $user = $request->session()->get('user_id');
            return view('admin.admin_panel', ['user' => $user]);
        })->name('admin_panel');

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'show'])->name('admin_panel_categories');
            Route::get('/add', [CategoryController::class, 'show_adding'])->name('adding category get');
            Route::post('/add', [CategoryController::class, 'adding_category'])->name('adding category post');
            Route::get('/edit/{id}', [CategoryController::class, 'showing_edit'])->name('category edit get');
            Route::put('/edit/{id}', [CategoryController::class, 'edit'])->name('category edit post');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroying a category');
        });

        Route::prefix('message')->group(function () {

            Route::get('/', [MessageController::class, 'index'])->name('admin_message');
            Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('admin_message_edit');
            Route::post('/update/{id}', [MessageController::class, 'update'])->name('admin_message_update');
            Route::get('/delete/{id}', [MessageController::class, 'destroy'])->name('admin_message_delete');
            Route::get('/show', [MessageController::class, 'show'])->name('admin_message_show');
        });

        Route::prefix('blog')->group(function () {

            Route::get('/', [BlogController::class, 'index'])->name('showing blogs');
            Route::get('/add', [BlogController::class, 'show'])->name('adding blog');
            Route::post('/add', [BlogController::class, 'create'])->name('creating blog');;
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('editing blog');;
            Route::put('/edit/{id}', [BlogController::class, 'update'])->name('updating blog');;
            Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('destroying a blog');
            // Route::get('/', [BlogController::class], '');

        });

        Route::prefix('image')->group(function () {

            Route::get('/add/{id}', [ImageGalleryController::class, 'show'])->name('showing image gallery');
            Route::post('/store/{id}', [ImageGalleryController::class, 'store'])->name('adding a new image');
            Route::delete('/delete/{blog_id}/{image_id}', [ImageGalleryController::class, 'destroy'])->name('destroying an image');
            // Route::get('/', [BlogController::class], '');

        });

        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('showing comment');
            Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('editing comment');
            Route::post('/update/{id}', [CommentController::class, 'update'])->name('updating comment');
            Route::delete('/delete/{id}', [CommentController::class, 'destroy'])->name('destroying comment');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin users');
            Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin user add');
            Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin user store');;
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin user edit');;
            Route::put('/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin user update');;
            Route::delete('/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin user delete');
            Route::post('/show/{id}', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin order show');;
            Route::get('/userrole/{id}', [App\Http\Controllers\Admin\UserController::class, 'user_roles'])->name('admin user roles');;
            Route::post('/userrolestore/{id}', [App\Http\Controllers\Admin\UserController::class, 'user_role_store'])->name('admin user role add');;
            Route::post('/userroledelete/{id}{role_id}', [App\Http\Controllers\Admin\UserController::class, 'user_role_delete'])->name('admin user role delete');;
        });

        Route::get('/setting', [SettingController::class, 'index'])->name('showing setting');
        Route::put('/setting', [SettingController::class, 'update'])->name('updating setting');
    });
});


Route::get('/delete', function (Request $request) {
    $request->session()->flush();
    return redirect()->intended('/');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
