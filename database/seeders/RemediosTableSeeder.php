<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Remedio;

class RemediosTableSeeder extends Seeder
{
    public function run(): void
    {
        Remedio::firstOrCreate(['nome' => 'Paracetamol']);
        Remedio::firstOrCreate(['nome' => 'Dipirona']);
        Remedio::firstOrCreate(['nome' => 'Ibuprofeno']);
    }
}