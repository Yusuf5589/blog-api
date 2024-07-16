<?php

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Date;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
    })->withSchedule(function (Schedule $schedule) {
        $schedule->call(function(){
            $date = Carbon::now()->toDateString();
            Blog::where('beginning_date', $date)->update([
                'status' => 1
            ]);
        })->daily();
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
