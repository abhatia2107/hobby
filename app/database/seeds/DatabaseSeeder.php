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

		$this->call('BatchTableSeeder');
        $this->command->info('batch table seeded!');

		$this->call('BatchKeywordMapSeeder');
		$this->command->info('batch keyword map seeded!');

		$this->call('BatchPhotoMapSeeder');
		$this->command->info('batch photo map seeded!');

		$this->call('CategoryTableSeeder');
        $this->command->info('category table seeded!');

		$this->call('CategoryInstituteMapSeeder');
		$this->command->info('category institute map seeded!');

		$this->call('CommentTableSeeder');
		$this->command->info('comment table seeded!');

		$this->call('InstituteTableSeeder');
        $this->command->info('institute table seeded!');

		$this->call('KeywordTableSeeder');
		$this->command->info('keyword table seeded!');

		$this->call('LocationTableSeeder');
		$this->command->info('location table seeded!');

		$this->call('UserTableSeeder');
        $this->command->info('user table seeded!');

		$this->call('VenueTableSeeder');
		$this->command->info('venue table seeded!');

		$this->call('SubcategoryTableSeeder');
		$this->command->info('subcategory table seeded!');

	}

}
