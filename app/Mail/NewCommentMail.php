<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCommentMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build(){
        //burada Blade sayfasına yölendirip yollandığımız mailin sayfasını ayarlıyoruz.
        return $this->view('mail.comments')->subject("New Comments");
    }

}
