<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\Front\FrontUserAuthController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\CommentController;


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

//Task 4, Task 5
Route::get('/',[HomeController ::class,'index'])->name('home');
Route::get('/detail/{id}',[HomeController ::class,'detail'])->name('detail');


Route::middleware(['front_user_login'])->controller(PostController::class)->group(function () {
    Route::get('/post/index', 'index')->name('post.index');
    Route::post('/post/create', 'create')->name('post.create');
    Route::get('/post/manage', 'manage')->name('post.manage');
    Route::get('/post/edit/{id}', 'edit')->name('post.edit');
    Route::post('/post/update/{id}', 'update')->name('post.update');
    Route::get('/post/delete/{id}', 'delete')->name('post.delete');

});

Route::middleware(['front_user_login'])->controller(CommentController::class)->group(function () {
    Route::post('/comment/create', 'create')->name('comment.create');
    Route::any('/comment/delete/{id}', 'delete')->name('comment.delete');
});
Route::controller(FrontUserAuthController::class)->group(function () {

    Route::middleware(['front_user_logout'])->group(function (){
        Route::get('/front/login', 'login')->name('front.login');
        Route::any('/front/login/check', 'check')->name('front.login.check');
        Route::get('/front/registration', 'registration')->name('front.registration');
        Route::post('/front/user/create', 'create')->name('front.user.create');
    });
    Route::any('/front/logout', 'logout')->name('front.logout')->middleware('front_user_login');
});


// Task 1 & Task 3

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    // Task 1
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/index', 'index')->name('product.index');
        Route::post('/product/create', 'create')->name('product.create');
        Route::get('/product/manage', 'manage')->name('product.manage');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update/{id}', 'update')->name('product.update');
        Route::get('/product/delete/{id}', 'delete')->name('product.delete');

    });

    //Task 3
    Route::controller(TaskController::class)->group(function () {
        Route::get('/task/index', 'index')->name('task.index');
        Route::any('/task/create', 'create')->name('task.create');
        Route::get('/task/manage', 'manage')->name('task.manage');
        Route::post('/task/status/update/{id}', 'status_update')->name('task.status.update');
        Route::get('/task/delete/{id}', 'delete')->name('task.delete');
    });

});
