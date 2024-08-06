<?php

namespace App\Http\Controllers;

use App\Repository\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comments;

    public function __construct(CommentRepository $comments){
        $this->comments = $comments;
    }

    //e ğ er ki girdi ğ i verilerde validate hatas ı yoksa repoyu ç ag ı r ı yor.
    public function commentSend(Request $req){
        $req->validate([
            "comments" => "required",
            "comments_mail" => "required|email",
            "blog_slug" => "required",
        ]);
                
            $this->comments->commentSendRep($req->all());
            return response()->json([
                "status" =>"success",
                "message" => "Comment created successfully",
            ]);

    }
    //repoyu ç ag ı r ı yor
    public function get($blogslug){

        return $this->comments->getRep($blogslug);

    }

}