<?php

namespace App\Http\Controllers;

use App\Repository\CommentsRep;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(CommentsRep $comments){
        $this->comments = $comments;
    }

    
    public function commentsSend(Request $req){
        $req->validate([
            "comments" => "required",
            "comments_gmail" => "required|email",
            "comments_blog_title" => "required",
        ]);
        
        try {
            $this->comments->commentsSendRep($req->all());
            return response()->json([
                "status" =>"success",
                "message" => "Comment created successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }



    }
}