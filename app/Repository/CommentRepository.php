<?php

namespace App\Repository;

use App\Http\Resources\CommentResource;
use App\Interface\CommonInterface;
use App\Jobs\NewCommentSendMail;
use App\Models\Comment;

class CommentRepository
{
    //Database yorum olu ş turuyor ve mail yollama i ş lemini ç al ış t ı r ı yor(JOB)
    public function commentSend(array $req){
        $comment = Comment::create([
            "comments" => $req["comments"],
            "comments_mail" => $req["comments_mail"],
            "blog_slug" => $req["blog_slug"],
            "status" => 0,
        ]);
        NewCommentSendMail::dispatch();
        return $comment;
    }


    //Blog idyi al ı p idsi ee ş lesen t ü m yorumlar ı json format ı nda d ö nd ü r ü yor
    public function get($blogslug){
        
        
        $comments = Comment::where("blog_slug", $blogslug)->where("status", true)->get();

        return CommentResource::collection($comments);
    }


}
