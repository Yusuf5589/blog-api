<?php

namespace App\Service;

use App\Http\Traits\ResponserTrait;
use App\Repository\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    use ResponserTrait;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getAll(){
        $categoryGet = $this->categoryRepository->getAll();

        return $this->successResponse(
            $categoryGet,
            null
        );
    }



    public function getSlug($categorySlug){

        $categoryIdGet = $this->categoryRepository->getSlug($categorySlug);

        return $this->successResponse(
            $categoryIdGet,
            null
        );
    }

    
    public function getFirst($categoryId){

        $categoryFirstApi = $this->categoryRepository->getFirst($categoryId);

        return $this->successResponse(
            $categoryFirstApi,
            null
        );
    }

}
