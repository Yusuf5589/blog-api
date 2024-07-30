<?php

namespace App\Http\Middleware;

use Closure;
use Throwable;
use App\Exceptions\CustomException;

class HandleExceptionsMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (Throwable $th) {
            throw new CustomException($th->getMessage(), $th->getCode(), $th);
        }
    }
}
