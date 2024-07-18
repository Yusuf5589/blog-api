<?php

namespace App\Repository;

use App\Interface\CommonInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class BlogRep implements CommonInterface
{

    public function getRep(){
        try {
            $blog = Blog::where("status", true);
            
            Cache::put("getblog", $blog->get(), 60*60); 

            return response()->json([
                "status" => "success",
                "api" => Cache::get("getblog"),
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
            
        }

    }
    
}
