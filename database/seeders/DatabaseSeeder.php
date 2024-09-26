<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Institute;
use App\Models\Region;
use App\Models\Student;
use App\Models\Group;
use App\Models\Manager;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(
            [
                UserSeeder::class,
                PersonSeeder::class,
                RegionSeeder::class,
                ManagerSeeder::class,
                TesterSeeder::class,
                InstituteSeeder::class,
                CenterSeeder::class,
                TeacherSeeder::class,
                GroupSeeder::class,
                SubjectSeeder::class,
                StudentSeeder::class,
            ]
        );


        // // Create 10 regions
        // Region::factory()->count(10)->create();
        // $managers = Manager::factory()->count(5)->create();
        // // Create 5 institutes, each with 3 student classes


        // // Create 50 students with random data
        // Student::factory()->count(50)->create();
    }
}
