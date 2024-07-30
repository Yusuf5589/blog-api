<?php

namespace App\Http\Controllers;

use App\Repository\CommentsRepository;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(CommentsRepository $comments){
        $this->comments = $comments;
    }

    //eğer ki girdiği verilerde validate hatası yoksa repoyu çagırıyor.
    public function commentsSend(Request $req){
        $req->validate([
            "comments" => "required",
            "comments_mail" => "required|email",
            "blogId" => "required",
        ]);
                
            $this->comments->commentsSendRep($req->all());
            return response()->json([
                "status" =>"success",
                "message" => "Comment created successfully",
            ]);

    }
    //repoyu çagırıyor
    public function getComment($blogId){

        return $this->comments->getCommentRep($blogId);

    }

}