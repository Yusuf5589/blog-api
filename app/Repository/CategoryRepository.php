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
        $categoryGet = CategoryResource::collection(Cache::get("getcategory"));

        return $categoryGet;
    }

    //category_idsi tutan t ü m bloglar ı veritaban ı ndan ç ag ı r ı p json format ı nda d ö n ü yor
    public function getSlug($categorySlug){
        $categoryId = Category::where('slug', $categorySlug)->first();

        $categoryGet = Blog::where("category_id", $categoryId->id)->get();

        $categoryData = BlogResource::collection($categoryGet);
        return $categoryData;
    }
    
    //idsi tutan categoryi databaseden ç a ğı r ı p json format ı nda d ö n ü yor.
    public function getFirst($categoryId){
        $categoryFirstApi = Category::where("id", $categoryId)->first();

    //Frontda Sadece Name ihtiyac ı m ı z oldu ğ u i ç in CategoryDetailResource ile sadece name'i getiriyorum.
        return new CategoryDetailResource($categoryFirstApi);

    }

}
