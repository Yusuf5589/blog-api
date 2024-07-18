<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRep;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $data;

    public function __construct(CategoryRep $categoryRepository){
        $this->data = $categoryRepository;
    }

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
}
