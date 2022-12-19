<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::middleware('isAdmin')->group(function(){
    
});


//Author
Route::middleware('isAuthor')->group(function(){
    
    //posts
    Route::get('/submitPost',[\App\Http\Controllers\AuthorController::class, 'submitPost']);
    Route::post('/savePost',[\App\Http\Controllers\AuthorController::class, 'savePost']);
    Route::get('editPost/{postId}',[\App\Http\Controllers\AuthorController::class, 'editPost']);
    Route::post('/updatePost/{postId}',[\App\Http\Controllers\AuthorController::class, 'updatePost']);
    Route::get('listPosts',[\App\Http\Controllers\AuthorController::class, 'listPosts']);
    Route::get('deletePost/{postId}',[\App\Http\Controllers\AuthorController::class, 'deletePost']);
    //comments
    Route::get('/listComments',[\App\Http\Controllers\AuthorController::class, 'listComments']);
    Route::get('/addComment',[\App\Http\Controllers\AuthorController::class, 'addComment']);
    Route::get('/addComment/{postId}',[\App\Http\Controllers\AuthorController::class, 'addCommentToPost']);
    Route::post('/saveComment',[\App\Http\Controllers\AuthorController::class, 'saveComment']);
    Route::get('/editComment/{commentId}',[\App\Http\Controllers\AuthorController::class, 'editComment']);
    Route::post('/updateComment/{CommentId}',[\App\Http\Controllers\AuthorController::class, 'updateComment']);
    Route::get('deleteComment/{commentId}',[\App\Http\Controllers\AuthorController::class, 'deleteComment']);

});