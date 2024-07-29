<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    //repoyu çagırıyor
    public function getCategory(){
        try {
            return $this->categoryRepository->getApiRepository();

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }

    //repoyu çagırıyor
    public function getCategorySlug($category){
        try {
            return $this->categoryRepository->getCategorySlugRep($category);

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }

    //repoyu çagırıyor
    public function getCategoryFirst($category){
        try {
            return $this->categoryRepository->getCategoryFirstRep($category);

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }


}
