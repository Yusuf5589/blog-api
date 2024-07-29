<?php

namespace App\Http\Controllers;


use App\Repository\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    protected $blogRepository;

    //bura repositorydeki işlemleri çekmeye veya oraya veri yollamaya yarıyor
    public function __construct(BlogRepository $blogRepository){
        $this->blogRepository = $blogRepository;
    }

    //tüm blogları bize repositoryden getiriyor
    public function getBlog(){
        try {
            return $this->blogRepository->getApiRepository();

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
            return $this->blogRepository->getBlogFirstRep($id);

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }

    }

    //repositorydeki tıklandığında görüntülanme sayısını arttırdığı functionu çağrıyor.
    // public function blogView($id){
    //     return $this->blogRepository->blogViewRep($id);
    // }


}