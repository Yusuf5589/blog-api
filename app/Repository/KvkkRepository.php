<?php

namespace App\Repository;

use App\Interface\GeneralInterface;
use App\Models\Kvkk;

class KvkkRepository implements GeneralInterface
{
    /**
     * Create a new class instance.
     */
    public function getRep()
    {
        $data = Kvkk::get();
        return response()->json([
            "status" => "success",
            "api" => $data,
        ]);
        
    }
}
