<?php

namespace App\Repository;

use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryDetailResource;
use App\Http\Resources\CategoryResource;
use App\Interface\GeneralInterface;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryRepository implements GeneralInterface
{

    //t ü m categoryleri getirip json format ı nda d ö n ü yor.
    public function getAll(){
        $category = Category::all();
        Cache::put("getcategory", $category, 60*60); 

        return response()->json([
            "status" => "success",
            "api" => CategoryResource::collection(Cache::get("getcategory")),
        ]);
    }

    //category_idsi tutan t ü m bloglar ı veritaban ı ndan ç ag ı r ı p json format ı nda d ö n ü yor
    public function getSlug($category){
        $categoryApi = Blog::where("category_id", $category)->get();

    
        return response()->json([
            "status" => "success",
            "api" => BlogResource::collection($categoryApi),
        ]);
    }
    
    //idsi tutan categoryi databaseden ç a ğı r ı p json format ı nda d ö n ü yor.
    public function getFirst($category){
        $categoryFirstApi = Category::where("id", $category)->first();

    //Frontda Sadece Name ihtiyac ı m ı z oldu ğ u i ç in CategoryDetailResource ile sadece name'i getiriyorum.
        return response()->json([
            "status" => "success",
            "api" => new CategoryDetailResource($categoryFirstApi),
        ]);
    }

}
