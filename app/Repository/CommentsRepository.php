<?php

namespace App\Repository;
use App\Interface\CommonInterface;
use App\Jobs\NewCommentSendMail;
use App\Models\Comment;

class CommentsRepository
{
    //Database yorum oluşturuyor ve mail yollama işlemini çalıştırıyor(JOB)
    public function commentsSendRep(array $req){
        Comment::create([
            "comments" => $req["comments"],
            "comments_mail" => $req["comments_mail"],
            "blogslug" => $req["blogslug"],
            "status" => 0,
        ]);
        NewCommentSendMail::dispatch();
    }


    //Blog idyi alıp idsi eeşlesen tüm yorumları json formatında döndürüyor
    public function getCommentRep($blogslug){
        
        
        $comments = Comment::where("blogslug", $blogslug)->where("status", true)->get();

        return response()->json([
            "status" => "success",
            "api" => $comments,
        ]);
    }


}
