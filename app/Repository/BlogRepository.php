<?php

namespace App\Repository;

use App\Http\Resources\BlogResource;
use App\Interface\GeneralInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class BlogRepository implements GeneralInterface
{

    public function getAll(){
        //Aktif olab bloglar ı cache kaydedip json format ı nda d ö nd ü r ü yor.
        $blog = Blog::where("status", true)->orderByDesc("view_count")->get();
        
        Cache::put("getblog", $blog, 60*60); 

        return response()->json([
            "status" => "success",
            "api" => BlogResource::collection(Cache::get("getblog")),
        ]);

    }


    //idsini girdi ğ imiz blogu getiriyor
    public function getFirst($slug){
        $blog = Blog::where("slug", $slug)->first();
        return response()->json([
            "status" => "success",
            "api" => new BlogResource($blog),
        ]);
    }

    //t ı kland ığı nda g ö r ü nt ü lanme say ı s ı n ı artt ı r ı yor.
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
