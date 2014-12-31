<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LocalitiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1,30) as $index)
		{
			Locality::create([
				'locality_location_id'=>$faker->randomDigitNotNull,
                'locality'=>$faker->name,
			]);
		}
	}

}