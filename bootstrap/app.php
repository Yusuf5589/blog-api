<?php

use App\Http\Middleware\HandleExceptionsMiddleware;
use App\Mail\CommentsMail;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        HandleExceptionsMiddleware::class;
    })->withSchedule(function (Schedule $schedule) {
        //Schedule ile her gece 12'de tarihi gelen bloglar ı aktif ediyor.E ğ er tarihi ge ç tiyse pasif yap ı yor.
        // $schedule->call(function(){
        //     $date = Carbon::now()->toDateString();
        //     Blog::where('beginning_date',"<=", $date)->update([
        //         'status' => 1
        //     ]);
        //     Blog::where('finish_date',">", $date)->update([
        //         'status' => 1
        //     ]);
        //     Blog::where('finish_date',"<", $date)->update([
        //         'status' => 0
        //     ]);
        // })->dailyAt('00:00');
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })
    ->withEvents(discover: [
        app_path('Domain/Listeners')
    ])->create();
