<?php

namespace Database\Seeders;

use App\Models\Privacy_Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Privacy_Policy::create([
            "title" => "Privacy Policy Title",
            "description" => "Privacy Policy Description"
        ]);
    }
}
