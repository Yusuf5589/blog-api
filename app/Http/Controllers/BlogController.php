<?php

namespace App\Http\Controllers;

use App\Entities\BlogRepository;
use App\Repository\BlogRep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    protected $data;

    public function __construct(BlogRep $blogRepository){
        $this->data = $blogRepository;
    }

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
}
