<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'subject_id' => Subject::factory(),  // Asociamos una materia aleatoria
            'teacher_id' => User::factory(),  // Asociamos un profesor aleatorio
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),  // Fecha de vencimiento aleatoria dentro de un mes
        ];
    }
}
