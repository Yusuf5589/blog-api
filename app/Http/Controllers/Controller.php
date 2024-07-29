<?php

namespace App\Http\Controllers;

use App\Repository\KvkkRepository;
use App\Repository\PrivacyRepository;

class Controller
{

    protected $kvkk, $privacy;

    public function __construct(KvkkRepository $kvkkrepository, PrivacyRepository $privacyRepository){
        $this->kvkk = $kvkkrepository;
        $this->privacy = $privacyRepository;
    }

    //repoyu çagırıyor
    public function getKvkk(){
        try {

            return $this->kvkk->getApiRepository();

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }

    //repoyu çagırıyor
    public function getPrivacy(){
        try {

            return $this->privacy->getApiRepository();

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }


}
