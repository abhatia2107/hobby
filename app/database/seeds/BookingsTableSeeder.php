<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BookingsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Booking::create([
				'batch_id'=>$faker->randomNumber(1,30),
				'user_id'=>$faker->randomNumber(1,30),
				'payment'=>$faker->randomNumber(100,1000),
				'booking_date'=>$faker->dateTime(),
				'no_of_sessions'=>$faker->randomNumber(1,6),
				'reference_id'=>$faker->bothify(8),
				'promo_id'=>$faker->randomNumber(1,30),
				'credit_used'=>$faker->boolean(),
			]);
		}
	}

}