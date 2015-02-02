<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SchedulesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		foreach(range(1, 1000) as $index)
		{
			DB::table('schedules')->insert(array(
				'schedule_batch_id'=>$faker->unique()->randomNumber(1,1000),
				'schedule_price' =>$faker->randomNumber(1000,5000),
				'schedule_start_date' =>$faker->date($format = 'Y-m-d', $max = 'now'),
				'schedule_end_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'schedule_start_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
				'schedule_end_time' => $faker->time($format = 'H:i:s', $max = 'now'),
				'schedule_session_month'=>$faker->boolean(),
				'schedule_number'=>$faker->randomNumber(10,20),
				'schedule_no_of_classes_in_week'=>$faker->randomNumber(1,7),
                'schedule_class_on_monday'=>$faker->boolean(),
				'schedule_class_on_tuesday'=>$faker->boolean(),
				'schedule_class_on_wednesday'=>$faker->boolean(),
				'schedule_class_on_thursday'=>$faker->boolean(),
				'schedule_class_on_friday'=>$faker->boolean(),
				'schedule_class_on_saturday'=>$faker->boolean(),
				'schedule_class_on_sunday'=>$faker->boolean(),
			));
		}
	}

}