<?php

namespace App\Repository;

use App\Models\Policy;

class ContractRepository
{


    public function getFirst($slug){

        $contract = Policy::where('slug', $slug)->first();
        
        return response()->json([
            "status" => "success",
            "api" => $contract
        ]);

    }
    
}
