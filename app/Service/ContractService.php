<?php

namespace App\Service;

use App\Http\Traits\ResponserTrait;
use App\Repository\ContractRepository;

class ContractService
{

    protected $contractRepository;

    use ResponserTrait;

    public function __construct(ContractRepository $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }


    public function getFirst($slug){

        $contract = $this->contractRepository->getFirst($slug);

        return $this->successResponse(
            $contract,
            null
        );
    }


}
