<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\CategoryRep;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $data;

    public function __construct(CategoryRep $categoryRepository){
        $this->data = $categoryRepository;
    }

    //repoyu çagırıyor
    public function getCategory(){
        try {
            return $this->data->getRep();

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
            return $this->data->getCategorySlugRep($category);

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
            return $this->data->getCategoryFirstRep($category);

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }


}
