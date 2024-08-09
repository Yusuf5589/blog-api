<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Service\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    //repoyu ç ag ı r ı yor
    public function get(){
        
        return $this->categoryService->getAll();

    }

    //repoyu ç ag ı r ı yor
    public function getSlug($categorySlug){

        return $this->categoryService->getSlug($categorySlug);
        
    }

    //repoyu ç ag ı r ı yor
    public function getFirst($categoryId){

        return $this->categoryService->getFirst($categoryId);
        
    }


}
