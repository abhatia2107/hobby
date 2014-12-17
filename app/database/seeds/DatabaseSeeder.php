<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
        $this->command->info('users table seeded!');

		$this->call('LocationTableSeeder');
		$this->command->info('location table seeded!');

		$this->call('ClassesTableSeeder');
		$this->command->info('classes table seeded!');

	}

}
