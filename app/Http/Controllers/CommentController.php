<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Service\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService){
        $this->commentService = $commentService;
    }

    //e ğ er ki girdi ğ i verilerde validate hatas ı yoksa repoyu ç ag ı r ı yor.
    public function commentSend(CommentRequest $req){
        // $req->validate([
        //     "commentService" => "required",
        //     "commentService_mail" => "required|email",
        //     "blog_slug" => "required",
        // ]);
                
            $this->commentService->commentSend($req->all());
            return response()->json([
                "status" =>"success",
                "message" => "Comment created successfully",
            ]);

    }
    //repoyu ç ag ı r ı yor
    public function get($blogslug){

        return $this->commentService->get($blogslug);

    }

}