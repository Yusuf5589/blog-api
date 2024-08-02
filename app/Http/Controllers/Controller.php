<?php

namespace App\Http\Controllers;

use App\Repository\ContractRepository;

class Controller
{
    protected $contractRepository;

    public function __construct(ContractRepository $contractRepository){
        $this->contractRepository = $contractRepository;
    }

    public function getContractFirst($slug){

        return $this->contractRepository->getContractFirstRep($slug);
        
    }


}
