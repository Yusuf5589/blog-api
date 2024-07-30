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
        
        return $this->categoryRepository->getApiRepository();

    }

    //repoyu çagırıyor
    public function getCategorySlug($category){

        return $this->categoryRepository->getCategorySlugRep($category);
        
    }

    //repoyu çagırıyor
    public function getCategoryFirst($category){

        return $this->categoryRepository->getCategoryFirstRep($category);
        
    }


}
