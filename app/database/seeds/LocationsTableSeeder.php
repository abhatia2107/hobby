<?php
 
class LocationsTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
              foreach(range(1,10) as $index)
              {
                     DB::table('locations')->insert(array(
                     'location' =>$faker->unique()->city,
                     ));
              }
       }
}
?>