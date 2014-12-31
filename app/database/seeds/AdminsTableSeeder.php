<?php

class AdminsTableSeeder extends Seeder {

   	public function run()
   	{
		$faker = Faker\Factory::create();
		foreach(range(1,30) as $index)
		{ 
			DB::table('admins')->insert(array(
			'admin_user_id'=>$faker->unique()->randomNumber(1,30),
		));
		}
  	}

}