<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    //Hatalar ı Loglar
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    
    //Hatalar ı Http yan ı t ı olark d ö nd ü r ü r
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CustomException) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }
    
        return parent::render($request, $exception);
    }
}
