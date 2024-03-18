<?php

namespace Database\Factories;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SensorFactory extends Factory
{
    protected $model = Sensor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
