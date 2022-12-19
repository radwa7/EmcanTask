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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

//Admin access if needed for only admins routes
Route::middleware('isAdmin')->group(function(){
    
});


//Author access
Route::middleware('isAuthor')->group(function(){
    
    //posts
        //submit post
        Route::get('/submitPost',[\App\Http\Controllers\AuthorController::class, 'submitPost']);
        Route::post('/savePost',[\App\Http\Controllers\AuthorController::class, 'savePost']);
        //Edit post
        Route::get('editPost/{postId}',[\App\Http\Controllers\AuthorController::class, 'editPost']);
        Route::post('/updatePost/{postId}',[\App\Http\Controllers\AuthorController::class, 'updatePost']);
        //List posts
        Route::get('listPosts',[\App\Http\Controllers\AuthorController::class, 'listPosts']);
        //Delete post
        Route::get('deletePost/{postId}',[\App\Http\Controllers\AuthorController::class, 'deletePost']);

    
    //comments
        //List Comments
        Route::get('/listComments',[\App\Http\Controllers\AuthorController::class, 'listComments']);
        //Add Comment 
        Route::get('/addComment/{postId}',[\App\Http\Controllers\AuthorController::class, 'addCommentToPost']);
        Route::post('/saveComment',[\App\Http\Controllers\AuthorController::class, 'saveComment']);
        //Edit Comment
        Route::get('/editComment/{commentId}',[\App\Http\Controllers\AuthorController::class, 'editComment']);
        Route::post('/updateComment/{CommentId}',[\App\Http\Controllers\AuthorController::class, 'updateComment']);
        //Delete Comment
        Route::get('deleteComment/{commentId}',[\App\Http\Controllers\AuthorController::class, 'deleteComment']);

});