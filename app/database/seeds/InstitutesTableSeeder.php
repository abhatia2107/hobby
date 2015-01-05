<?php
 
class InstitutesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
              $faker->addProvider(new Faker\Provider\en_GB\Internet($faker));
              $faker->addProvider(new Faker\Provider\en_US\Company($faker));
              foreach(range(1,30) as $index)
              { 
                     DB::table('institutes')->insert(array(
                     'institute' =>$faker->company,
                     'institute_location_id'=>$faker->randomDigitNotNull,
                     'institute_url' =>$faker->company,
                     'institute_user_id'=>$faker->unique()->randomNumber(1,30),
                     'institute_website' =>$faker->url,
                     'institute_fblink' =>$faker->userName,
                     'institute_twitter' =>$faker->userName,
                     'institute_description'=>$faker->text(),
                     'institute_rating' =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5),
                     'institute_approved'=>$faker->boolean(),
                     'institute_photo'=>"0",
                     ));
              }
       }
}
?>