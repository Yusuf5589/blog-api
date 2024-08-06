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

    //repoyu ç ag ı r ı yor
    public function get(){
        
        return $this->categoryRepository->getAll();

    }

    //repoyu ç ag ı r ı yor
    public function getSlug($category){

        return $this->categoryRepository->getSlug($category);
        
    }

    //repoyu ç ag ı r ı yor
    public function getFirst($category){

        return $this->categoryRepository->getFirst($category);
        
    }


}
