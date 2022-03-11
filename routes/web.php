<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OldPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

/*Route::get('/posts', [OldPostController::class, "index"])->name("posts.index");

Route::get('/posts/create', [OldPostController::class, "create"])->name("posts.create");

Route::post("/posts",[OldPostController::class,"store"])->name("posts.store");

Route::get('/posts/{post}', [OldPostController::class, "show"])->name("posts.show");

Route::get('/posts/{post}/edit', [OldPostController::class, "edit"])->name("posts.edit");

Route::put("/post/{post}",[OldPostController::class,"update"])->name("posts.update");

Route::delete("/post/{post}",[OldPostController::class,"destroy"])->name("posts.destroy");

Route::get('/post/deleted', [OldPostController::class, 'deleted'])->name('posts.deleted');

Route::get('/post/restore/{post}', [OldPostController::class, 'restore'])->name('posts.restore');

Route::get('/userposts/{user}', [OldPostController::class, "userposts"])->name("user.posts");*/

Route::resource("posts", PostController::class)->middleware("auth");

Route::get('/post/deleted', [OldPostController::class, 'deleted'])->name('posts.deleted');

Route::get('/post/restore/{post}', [OldPostController::class, 'restore'])->name('posts.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
