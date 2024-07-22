<?php

namespace App\Repository;
use App\Interface\CommonInterface;
use App\Jobs\CommentsJob;
use App\Models\Comment;

class CommentsRep
{
    //Database yorum oluşturuyor ve mail yollama işlemini çalıştırıyor(JOB)
    public function commentsSendRep(array $req){
        Comment::create([
            "comments" => $req["comments"],
            "comments_gmail" => $req["comments_gmail"],
            "blogId" => $req["blogId"],
            "status" => 0,
        ]);
        CommentsJob::dispatch();
    }


    //Blog idyi alıp idsi eeşlesen tüm yorumları json formatında döndürüyor
    public function getCommentRep($blogId){
        
        
        $comments = Comment::where("blogId", $blogId)->where("status", true)->get();

        return response()->json([
            "status" => "success",
            "api" => $comments,
        ]);
    }


}
