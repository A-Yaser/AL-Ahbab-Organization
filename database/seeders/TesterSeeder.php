<?php

namespace Database\Seeders;

use App\Models\Tester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tester::factory()->count(10)->create();
    }
}
