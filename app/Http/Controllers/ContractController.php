<?php

namespace App\Http\Controllers;

use App\Service\ContractService;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected $contractService;

    public function __construct(ContractService $contractService){
        $this->contractService = $contractService;
    }

    public function getFirst($slug){

        return $this->contractService->getFirst($slug);
        
    }
}
