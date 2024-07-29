<?php

namespace App\Jobs;

use App\Mail\NewCommentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewCommentSendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 

    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Burada hangi Maile gidiceğini Envden gösterip maili yolluyoruz.
        Mail::to(env("JOB_MAIL_USERNAME"))->send(new NewCommentMail());
    }
}
