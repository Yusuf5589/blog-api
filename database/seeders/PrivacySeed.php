<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Policy::create([
            "title" => "Kvkk Title",
            "description" => "Kvkk Description",
            "slug" => "kvkk",
        ]);
     
        
        Policy::create([
            "title" => "Privacy Policy Title",
            "description" => "Privacy Policy Description",
            "slug" => "privacy_policy",
        ]);
    }
}
