<?php

namespace Database\Seeders;

use App\Models\Kvkk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KvkkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kvkk::create([
            "title" => "Kvkk Title",
            "description" => "Kvkk Description"
        ]);
    }
}
