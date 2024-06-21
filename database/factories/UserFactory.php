<?php

namespace Database\Factories;

use App\Models\WeatherData;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeatherData>
 */
class WeatherDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeatherData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'weather_main' => $this->faker->word,
            'weather_description' => $this->faker->sentence,
            'temperature' => $this->faker->randomFloat(2, 200, 300), // in Kelvin
            'feels_like' => $this->faker->randomFloat(2, 200, 300), // in Kelvin
            'temp_min' => $this->faker->randomFloat(2, 200, 300), // in Kelvin
            'temp_max' => $this->faker->randomFloat(2, 200, 300), // in Kelvin
            'pressure' => $this->faker->numberBetween(900, 1100), // in hPa
            'humidity' => $this->faker->numberBetween(0, 100), // in %
            'visibility' => $this->faker->numberBetween(1000, 10000), // in meters
            'wind_speed' => $this->faker->randomFloat(2, 0, 20), // in m/s
            'wind_deg' => $this->faker->numberBetween(0, 360), // in degrees
            'cloudiness' => $this->faker->numberBetween(0, 100), // in %
            'sunrise' => $this->faker->dateTime,
            'sunset' => $this->faker->dateTime,
            'city_name' => $this->faker->city,
        ];
    }
}
