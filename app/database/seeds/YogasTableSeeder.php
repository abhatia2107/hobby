<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class YogasTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Yoga::create([
                'name' => $faker->firstName,
                'email' => 'noemail'.$index.'@hobbyix.com',
                'contact_no' => $faker->phoneNumber,
                'locality_id' => 1,
			]);
		}
	}

}