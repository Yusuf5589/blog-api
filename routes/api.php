<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/comment/get/{blogId}', [CommentsController::class, "getComment"]);

Route::post('/comment/send', [CommentsController::class, "commentsSend"]);

Route::get('/blog/get', [BlogController::class, "getBlog"]);

Route::get('/category/get', [CategoryController::class, "getCategory"]);