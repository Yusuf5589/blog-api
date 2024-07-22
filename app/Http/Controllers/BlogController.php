<?php

namespace App\Http\Controllers;

use App\Entities\BlogRepository;
use App\Repository\BlogRep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    protected $data;

    //bura repositorydeki işlemleri çekmeye veya oraya veri yollamaya yarıyor
    public function __construct(BlogRep $blogRepository){
        $this->data = $blogRepository;
    }

    //tüm blogları bize repositoryden getiriyor
    public function getBlog(){
        try {
            return $this->data->getRep();

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }


    //idsini girdiğimiz blog geliyor sadece
    public function getBlogFirst($id){
        try {
            return $this->data->getBlogFirstRep($id);

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }

    }

    //repositorydeki tıklandığında görüntülanme sayısını arttırdığı functionu çağrıyor.
    public function blogView($id){
        return $this->data->blogViewRep($id);
    }


}