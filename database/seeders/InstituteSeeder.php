<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institute;
use App\Models\Manager;
use App\Models\Tester;
use App\Models\Region;
use App\Models\Center;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managers = Manager::all();
        $testers = Tester::all();
        $regions = Region::all();
        // $centers = Center::all();

        // Create 10 institutes
        $institutes = Institute::factory()->count(10)->create([
            'manager_id' => $managers->random()->id,
            'tester_id' => $testers->random()->id,
            'region_id' => $regions->random()->id,
        ]);

        // foreach ($institutes as $institute) {
        //     // Randomly attach 1 to 3 centers to each institute
        //     $institute->centers()->attach(
        //         $centers->random(rand(1, 3))->pluck('id')->toArray()
        //     );
        // }
    }
}
