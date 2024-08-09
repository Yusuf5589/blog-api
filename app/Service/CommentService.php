<?php

namespace App\Service;
use App\Http\Traits\ResponserTrait;
use App\Repository\CommentRepository;

class CommentService
{
    protected $commentRepository;

    use ResponserTrait;
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }


    public function commentSend(array $req){
        $comment = $this->commentRepository->commentSend($req);

        return $this->successResponse(
            $comment,
            "Comment sent successfully"
        );
    }


    public function get($blogslug){
        $comment = $this->commentRepository->get($blogslug);

        return $this->successResponse(
            $comment,
            null
        );
    }

}
