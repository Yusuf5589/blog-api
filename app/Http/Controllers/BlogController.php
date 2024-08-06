<?php

namespace App\Http\Controllers;


use App\Repository\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    protected $blogRepository;

    //bura repositorydeki i ş lemleri ç ekmeye veya oraya veri yollamaya yar ı yor
    public function __construct(BlogRepository $blogRepository){
        $this->blogRepository = $blogRepository;
    }

    //t ü m bloglar ı bize repositoryden getiriyor
    public function get(){

        return $this->blogRepository->getAll();
        
    }


    //idsini girdi ğ imiz blog geliyor sadece
    public function getFirst($slug){

        return $this->blogRepository->getFirst($slug);
        
    }

    //repositorydeki t ı kland ığı nda g ö r ü nt ü lanme say ı s ı n ı artt ı rd ığı functionu ç a ğ r ı yor.
    // public function blogView($id){
    //     return $this->blogRepository->blogViewRep($id);
    // }


}