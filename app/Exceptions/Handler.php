<?php

namespace App\Exceptions;

use App\Http\Traits\ResponserTrait;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    use ResponserTrait;

    //Hatalar ı Loglar
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    
    //Hatalar ı Http yan ı t ı olark d ö nd ü r ü r
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CustomException) {
            return $this->errorResponse($exception->getMessage());
        }
    
        return parent::render($request, $exception);
    }
}
