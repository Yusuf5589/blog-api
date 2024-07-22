<?php

namespace App\Repository;
use App\Interface\CommonInterface;
use App\Jobs\CommentsJob;
use App\Models\Comment;

class CommentsRep
{

    public function commentsSendRep(array $req){
        Comment::create([
            "comments" => $req["comments"],
            "comments_gmail" => $req["comments_gmail"],
            "blogId" => $req["blogId"],
            "status" => 0,
        ]);
        CommentsJob::dispatch();
    }



    public function getCommentRep($blogId){
        
        
        $comments = Comment::where("blogId", $blogId)->where("status", true)->get();

        return response()->json([
            "status" => "success",
            "api" => $comments,
        ]);
    }


}
