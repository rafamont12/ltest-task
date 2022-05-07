<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    private function jobs()
    {
        return [
            'Chemist',
            'Accountant',
            'School Teacher',
            'Methamphetamine manufacturer',
            'Methamphetamine distributor',
            'Agent of the Drug Enforcement Administration',
        ];
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $birthdayDelay = now()->year - (int) config('general.end_year');

        return [
            'name' => $this->faker->unique()->name,
            'birthday' => $this->faker->date('Y-m-d', "-$birthdayDelay years"),
            'occupations' => $this->faker->randomElements($this->jobs(), rand(0, 5)),
            'img' => $this->faker->unique()->imageUrl(640, 480, 'people'),
            'nickname' => $this->faker->unique()->word,
            'portrayed' => $this->faker->unique()->name,
        ];
    }
}
