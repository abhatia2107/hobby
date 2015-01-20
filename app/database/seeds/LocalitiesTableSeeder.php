<?php

class LocalitiesTableSeeder extends Seeder {

	public function run()
	{
		//Location_id=>1 stands for Hyderabad
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Alwal',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Banjara Hills',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Begumpet',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Chanda Nagar',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Gachibowli',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Hi Tech City',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Kondapur',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'KPHB',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Kukatpally',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Madhapur',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Madinaguda',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Manikonda',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Miyapur',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Sainikpuri',
		));
		DB::table('localities')->insert(array(
			'locality_location_id'=>'1',
			'locality'=>'Other',
		));
	}

}