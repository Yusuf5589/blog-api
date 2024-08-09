<?php

namespace App\Repository;

use App\Http\Resources\ContractResource;
use App\Models\Policy;

class ContractRepository
{


    public function getFirst($slug){

        $contract = Policy::where('slug', $slug)->first();
        
        return new ContractResource($contract);

    }
    
}
