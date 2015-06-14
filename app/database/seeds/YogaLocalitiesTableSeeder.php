<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class YogaLocalitiesTableSeeder extends Seeder {

	public function run()
	{

		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Alwal',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Banjara Hills',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Begumpet',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Chanda Nagar',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Gachibowli',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Hi Tech City',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Kondapur',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'KPHB',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Kukatpally',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Madhapur',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Madinaguda',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Manikonda',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Miyapur',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Sainikpuri',
		));
		DB::table('yoga_localities')->insert(array(
			
			'locality'=>'Other',
		));
	}

}