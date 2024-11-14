<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'teacher_id' => \App\Models\User::where('role', 'teacher')->inRandomOrder()->first()->id, // Asigna un profesor aleatorio
        ];
    }
}
