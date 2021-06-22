<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\House;
use Illuminate\Support\Str;

class housesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $newHouse = new House();
            $newHouse->address = $faker->address();
            $newHouse->title = $faker->catchPhrase();
            $newHouse->postal_code = $faker->postcode();
            $newHouse->city = $faker->city();
            $newHouse->country = $faker->country();
            $newHouse->meter_square = $faker->numberBetween(50 , 5000);
            $newHouse->rooms = $faker->numberBetween(0, 999);
            $newHouse->description = $faker->paragraphs(4, true);
            $newHouse->price = $faker->randomFloat(2, 20000, 999999);
            $newHouse->slug = Str::slug($newHouse->address, '-');
            $newHouse->save();
        }
    }
}
