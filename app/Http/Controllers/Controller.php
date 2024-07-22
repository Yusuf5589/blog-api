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


    public function getKvkk(){
        try {

            return $this->kvkk->getRep();

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }


    public function getPrivacy(){
        try {

            return $this->privacy->getRep();

        } catch (\Throwable $th) {
            return response()->json([
                "status" =>"error",
                "message" =>$th->getMessage(),
            ]);
        }
    }


}
