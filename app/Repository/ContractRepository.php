<?php

namespace App\Repository;

use App\Models\Policy;

class ContractRepository
{


    public function getContractFirstRep($slug){

        $contract = Policy::where('slug', $slug)->get()->first();
        
        return response()->json([
            "status" => "success",
            "api" => $contract
        ]);

    }
    
}
