<?php

namespace App\Http\Controllers;

use App\Repository\ContractRepository;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected $contractRepository;

    public function __construct(ContractRepository $contractRepository){
        $this->contractRepository = $contractRepository;
    }

    public function getFirst($slug){

        return $this->contractRepository->getFirst($slug);
        
    }
}
