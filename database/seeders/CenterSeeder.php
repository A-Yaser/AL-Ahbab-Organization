<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Institute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 centers
        $centers = Center::factory()->count(10)->create();

        // Assuming you have existing institutes, attach them to the centers
        $institutes = Institute::all();

        foreach ($centers as $center) {
            // Randomly attach 1 to 3 institutes to each center
            $center->institutes()->attach(
                $institutes->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
