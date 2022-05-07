<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() : array
    {
        $airDateStart = now()->year - (int) config('general.start_year');
        $airDateEnd = now()->year - (int) config('general.end_year');

        return [
            'title' => $this->faker->unique()->realText(20),
            'air_date' => $this->faker->unique()->dateTimeBetween("-$airDateStart years", "-$airDateEnd years")
        ];
    }
}
