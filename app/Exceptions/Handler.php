<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    //Hataları Loglar
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    
    //Hataları Http yanıtı olark döndürür
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CustomException) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }
    
        return parent::render($request, $exception);
    }
}
