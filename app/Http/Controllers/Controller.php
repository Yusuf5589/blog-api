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

        return $this->kvkk->getApiRepository();
        
    }

    //repoyu çagırıyor
    public function getPrivacy(){

        return $this->privacy->getApiRepository();

    }


}
