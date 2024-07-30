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

        return $this->blogRepository->getApiRepository();
        
    }


    //idsini girdiğimiz blog geliyor sadece
    public function getBlogFirst($id){

        return $this->blogRepository->getBlogFirstRep($id);
        
    }

    //repositorydeki tıklandığında görüntülanme sayısını arttırdığı functionu çağrıyor.
    // public function blogView($id){
    //     return $this->blogRepository->blogViewRep($id);
    // }


}