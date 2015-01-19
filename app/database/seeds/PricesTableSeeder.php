<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PricesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1000) as $index)
		{
			Price::create([
				'price_batch_id'=>$faker->unique()->randomNumber(1,1000),
				'price' =>$faker->randomNumber(1000,5000),
				'price_session_month'=>$faker->boolean(),
				'price_total_no_of_session'=>$faker->randomNumber(10,20),
				'price_total_no_of_month'=>$faker->randomNumber(1,5),
				'price_no_of_classes_in_week'=>$faker->randomNumber(1,7),
                'price_class_on_monday'=>$faker->boolean(),
				'price_class_on_tuesday'=>$faker->boolean(),
				'price_class_on_wednesday'=>$faker->boolean(),
				'price_class_on_thursday'=>$faker->boolean(),
				'price_class_on_friday'=>$faker->boolean(),
				'price_class_on_saturday'=>$faker->boolean(),
				'price_class_on_sunday'=>$faker->boolean(),
			]);
		}
	}

}