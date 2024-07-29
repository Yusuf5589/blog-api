<?php

namespace App\Repository;

use App\Interface\GeneralInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class BlogRep implements GeneralInterface
{

    public function getRep(){
        try {
            //Aktif olab blogları cache kaydedip json formatında döndürüyor.
            $blog = Blog::where("status", true)->orderByDesc("view_count");
            
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


    //idsini girdiğimiz blogu getiriyor
    public function getBlogFirstRep($id){

        return response()->json([
            "status" => "success",
            "api" => Blog::get()->where("id", $id)->first(),
        ]);
    }

    //tıklandığında görüntülanme sayısını arttırıyor.
    // public function blogViewRep($id){

    //     $blog = Blog::get()->where("id", $id)->first();

    //     Blog::where("id", $id)->update([
    //         "view_count" => $blog->view_count + 1
    //     ]);
        

    //     return response()->json([
    //         "status" => "success",
    //     ]);
    // }

    
}
