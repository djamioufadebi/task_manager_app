<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentences(), 
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['en attente', 'en cours', 'terminé']),
            'user_id' => User::factory(), 
        ];
    }
}
