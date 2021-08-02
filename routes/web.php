<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostReactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;

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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        if (Auth::user()) {
            return redirect()->route('posts.index');
        } else {
            return view('welcome');
        }
    })->name('home');


    Route::get('/profile', [UserController::class, 'editProfile'])->name('profile.edit');

    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::resource('posts', PostController::class);

    Route::post('/signin', [UserController::class, 'postSignIn'])->name('signin');

    Route::get('/logout', [UserController::class, 'getLogOut'])->name('logout');

    Route::resource('users', UserController::class);

    Route::post('/edit', [PostController::class, 'postEditPost'])->name('edit');

    Route::resource('postReactions', PostReactionController::class);

    Route::resource('postComments', PostCommentController::class);
});
