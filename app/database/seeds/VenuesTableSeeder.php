<?php
 
class VenuesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
              foreach(range(1,50) as $index)
              { 
                     DB::table('venues')->insert(array(
                     // 'venue'=>$faker->name,
                     'venue_location_id' =>1,
                     // 'venue_locality_id'=>$faker->randomNumber(1,15),
                     // 'venue_pincode'=>$faker->postcode,
                     // 'venue_email'=>$faker->email,
                     // 'venue_address' =>$faker->address,
                     // 'venue_contact_no' =>$faker->phoneNumber,
                     // 'venue_alternate_contact_no' =>$faker->phoneNumber,
                     'venue_user_id'=>$index+3,
                     'venue_institute_id'=>$index,
                     // 'venue_landmark'=>$faker->streetName,
                     // 'venue_latitude'=>$faker->latitude,
                     // 'venue_longitude'=>$faker->longitude,
                     ));
              }
       }
}
?>