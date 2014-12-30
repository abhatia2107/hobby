<?php

class AdminsTableSeeder extends Seeder {

   	public function run()
   	{
		$faker = Faker\Factory::create();
		foreach(range(1,20) as $index)
		{ 
			DB::table('admins')->insert(array(
			'admin_user_id'=>$faker->unique()->randomNumber(1,20),
		));
		}
  	}

}