<?php

namespace App\Repository;

use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Interface\GeneralInterface;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryRepository implements GeneralInterface
{

    //tüm categoryleri getirip json formatında dönüyor.
    public function getApiRepository(){
        $category = Category::all();
        Cache::put("getcategory", $category, 60*60); 

        return response()->json([
            "status" => "success",
            "api" => CategoryResource::collection(Cache::get("getcategory")),
        ]);
    }

    //category_idsi tutan tüm blogları veritabanından çagırıp json formatında dönüyor
    public function getCategorySlugRep($category){
        $categoryApi = Blog::where("category_id", $category)->get();

    
        return response()->json([
            "status" => "success",
            "api" => BlogResource::collection($categoryApi),
        ]);
    }
    
    //idsi tutan categoryi databaseden çağırıp json formatında dönüyor.
    public function getCategoryFirstRep($category){
        $categoryFirstApi = Category::where("id", $category)->first();

    
        return response()->json([
            "status" => "success",
            "api" => $categoryFirstApi,
        ]);
    }

}
