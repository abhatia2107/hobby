<?php

class LocationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('locations')->insert(array(
			'location' =>"Hyderabad",  
			'location_no_of_localities'=>15,
		));
	}
}
?>