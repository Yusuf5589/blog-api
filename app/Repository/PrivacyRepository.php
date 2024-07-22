<?php

namespace App\Repository;

use App\Interface\GeneralInterface;
use App\Models\Kvkk;
use App\Models\Privacy_Policy;

class PrivacyRepository implements GeneralInterface
{
    /**
     * Create a new class instance.
     */
    public function getRep()
    {
        $data = Privacy_Policy::get();
        return response()->json([
            "status" => "success",
            "api" => $data,
        ]);
        
    }
}
