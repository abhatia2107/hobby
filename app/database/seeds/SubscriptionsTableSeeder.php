<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubscriptionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1,30) as $index)
		{
			Subscription::create([
				'subscription_user_id'=>$faker->unique()->randomNumber(1,30),
				'suscription_email'=>$faker->unique()->email;
			]);
		}
	}

}