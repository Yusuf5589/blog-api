<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/comment', [CommentsController::class, "commentsSend"]);


