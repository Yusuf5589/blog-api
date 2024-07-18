<?php

namespace App\Repository;

use App\Interface\CommonInterface;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryRep implements CommonInterface
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


}
