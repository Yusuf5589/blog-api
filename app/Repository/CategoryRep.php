<?php

namespace App\Repository;

use App\Interface\GeneralInterface;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryRep implements GeneralInterface
{


    public function getRep(){
        try {
            $category = Category::all();
            Cache::put("getcategory", $category, 60*60); 

            return response()->json([
                "status" => "success",
                "api" => Cache::get("getcategory"),
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
            
        }
    }

    
    public function getCategorySlugRep($category){
        $data = Blog::where("category_id", $category)->get();

    
        return response()->json([
            "status" => "success",
            "api" => $data,
        ]);
    }
    

    public function getCategoryFirstRep($category){
        $data = Category::where("id", $category)->first();

    
        return response()->json([
            "status" => "success",
            "api" => $data,
        ]);
    }

}
