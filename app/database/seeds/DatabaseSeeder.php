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

		$this->call('AdminsTableSeeder');
        $this->command->info('Admins table seeded!');

 		$this->call('BatchKeywordSeeder');
 		$this->command->info('Batch Keyword seeded!');

		$this->call('BatchPhotoSeeder');
		$this->command->info('Batch Photo seeded!');

		$this->call('CategoriesTableSeeder');
	    $this->command->info('Categories table seeded!');

		$this->call('CategoryInstituteSeeder');
 		$this->command->info('Category Institute seeded!');

		$this->call('CommentsTableSeeder');
		$this->command->info('Comments table seeded!');

		$this->call('FeaturesTableSeeder');
		$this->command->info('Features table seeded!');

		$this->call('FeedbacksTableSeeder');
		$this->command->info('Feedbacks table seeded!');

		$this->call('InstitutesTableSeeder');
        $this->command->info('Institutes table seeded!');

		$this->call('LocationsTableSeeder');
		$this->command->info('Locations table seeded!');
		
		$this->call('LocalitiesTableSeeder');
		$this->command->info('Localites table seeded!');

		$this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');

		$this->call('VenuesTableSeeder');
		$this->command->info('Venues table seeded!');

		$this->call('SubcategoriesTableSeeder');
		$this->command->info('Subcategories table seeded!');

		$this->call('SubscriptionsTableSeeder');
		$this->command->info('Subscriptions table seeded!');

		$this->call('BatchesTableSeeder');
        $this->command->info('Batches table seeded!');

	}	
}
