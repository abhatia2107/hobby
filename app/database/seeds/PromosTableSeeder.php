<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Carbon\Carbon;

class PromosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Promo::create([
				'promo_code'=>$faker->randomNumber(100000,900000),
				'discount_percentage'=>$faker->randomNumber(10,50),
                'cash_discount'=>$faker->randomNumber(100,1000),
                'max_discount'=>$faker->randomNumber(200,1000),
                'valid_till'=>Carbon::now()->addDays($index),
				'max_allowed_count'=>$faker->randomNumber(100,300),
				'count'=>$faker->randomNumber(1,30),
			]);
		}
	}

}