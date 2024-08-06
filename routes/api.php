<?php

use App\Exceptions\CustomException;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContractController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Comments Routes

Route::get('/comment/get/{blogslug}', [CommentController::class, "get"]);

Route::post('/comment/send', [CommentController::class, "commentSend"]);


//Blog Routes

Route::get('/blog/get', [BlogController::class, "get"]);

Route::get('/blog/get/{slug}', [BlogController::class, "getFirst"]);

// Route::get('/category/view/{id}', [Blog::class, "retrieved"]);


Route::get('/contract/{slug}', [ContractController::class, "getFirst"]);



//Category Routes

Route::get('/category/get', [CategoryController::class, "get"]);

Route::get('/category/get/{slug}', [CategoryController::class, "getSlug"]);

Route::get('/category/get/first/{id}', [CategoryController::class, "getFirst"]);




