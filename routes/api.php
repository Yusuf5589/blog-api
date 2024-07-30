<?php

use App\Exceptions\CustomException;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Comments Routes

Route::get('/comment/get/{blogId}', [CommentsController::class, "getComment"]);

Route::post('/comment/send', [CommentsController::class, "commentsSend"]);


//Blog Routes

Route::get('/blog/get', [BlogController::class, "getBlog"]);

Route::get('/blog/get/{slug}', [BlogController::class, "getBlogFirst"]);

// Route::get('/category/view/{id}', [Blog::class, "retrieved"]);



Route::get('/kvkk/get', [Controller::class, "getKvkk"]); 

Route::get('/privacy/get', [Controller::class, "getPrivacy"]);


//Category Routes

Route::get('/category/get', [CategoryController::class, "getCategory"]);

Route::get('/category/get/{slug}', [CategoryController::class, "getCategorySlug"]);

Route::get('/category/get/first/{id}', [CategoryController::class, "getCategoryFirst"]);




