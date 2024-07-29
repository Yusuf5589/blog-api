<?php

namespace App\Repository;

use App\Interface\GeneralInterface;
use App\Models\Policy;

class PrivacyRepository implements GeneralInterface
{
    /**
     * Create a new class instance.
     */

    //Privacy_Policy modelinde verileri çağırıp json formatında döndürüyor
    public function getApiRepository()
    {
        $privacyApi = Policy::where('slug', "privacy_policy")->get();
        return response()->json([
            "status" => "success",
            "api" => $privacyApi,
        ]);
        
    }
}
