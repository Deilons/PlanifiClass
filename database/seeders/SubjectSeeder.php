<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;



class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use Database\Factories\SubjectFactory; 

    public function run()
    {
        Subject::factory(10)->create();
    }

}
