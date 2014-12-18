<?php
 
class VenuesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
              foreach(range(1,20) as $index)
              { 
                     DB::table('Venues')->insert(array(
                     'venue'=>$faker->name,
                     'venue_location' =>$faker->randomDigitNotNull,
                     'venue_locality'=>$faker->streetName,
                     'venue_pincode'=>$faker->postcode,
                     'venue_address' =>$faker->address,
                     'venue_contact_no' =>$faker->phoneNumber,
                     'venue_institute_id'=>$faker->randomDigitNotNull,
                     'venue_latitude'=>$faker->latitude,
                     'venue_longitude'=>$faker->longitude,
                     ));
              }
       }
}
?>