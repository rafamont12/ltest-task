<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Episode;
use App\Models\Quote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Cleaning tables before seeding them.
        collect(['characters', 'episodes', 'quotes'])->each(function (string $truncated) {
            DB::table($truncated);
        });

        $charactersIds = Character::factory(100)->create()->pluck('id');
        Episode::factory(30)->create()->each(function(Episode $episode) use ($charactersIds)
        {
            // Creating characters for each Episode instance[about 5-15 per unit]
            for ($c = 0; $c < rand(5, 15); $c++) {
                // Same thing for each Character[but 3-7 per unit]
                $randomCharacter = Arr::random($charactersIds->toArray());
                $episode->characters()->sync($randomCharacter);

                for ($j = 0; $j < rand(3, 7); $j++) {
                    Quote::create([
                        'quote' => (\Faker\Factory::create())->paragraph(1),
                        'character_id' => $randomCharacter,
                        'episode_id' => $episode->id,
                    ]);
                }
            }
        });
    }
}
