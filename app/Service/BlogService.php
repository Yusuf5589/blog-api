<?php

namespace App\Service;

use App\Events\Blog;
use App\Http\Traits\ResponserTrait;
use App\Repository\BlogRepository;

class BlogService
{

    protected  $blogRepository;

    use ResponserTrait;

    public function __construct(BlogRepository $blogRepository)
    {
        $blogAll = $this->blogRepository = $blogRepository;
        return $this->successResponse(
            $blogAll,
            null
        );
    }


    public function getAll()
    {
        $blog = $this->blogRepository->getAll();

        return $this->successResponse(
            $blog,
            null
        );
    }

        public function getFirst($slug)
    {
        $blog = $this->blogRepository->getFirst($slug);

        return response()->json([
            "status" => "success",
            "api" => $blog,
        ]);
    }

}
