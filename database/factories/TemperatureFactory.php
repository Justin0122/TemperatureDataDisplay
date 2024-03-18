<?php

namespace Database\Factories;

use App\Models\Temperature;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemperatureFactory extends Factory
{
    protected $model = Temperature::class;

    public function definition(): array
    {
        return [
            'sensor_id' => $this->faker->numberBetween(1, 10),
            'value' => $this->faker->randomFloat(2, 0, 22),
            'created_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ];
    }
}
