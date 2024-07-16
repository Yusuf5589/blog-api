<?php

namespace App\Repository;
use App\Interface\CommentsInterface;
use App\Jobs\CommentsJob;
use App\Models\Comment;

class CommentsRep implements CommentsInterface 
{



    public function commentsSendRep(array $req){
        Comment::create($req);
        CommentsJob::dispatch();
    }
}
