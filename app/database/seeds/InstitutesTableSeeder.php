<?php
 
class InstitutesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
              $faker->addProvider(new Faker\Provider\en_GB\Internet($faker));
              $faker->addProvider(new Faker\Provider\en_US\Company($faker));
              foreach(range(1,1000) as $index)
              { 
                     DB::table('institutes')->insert(array(
                     'institute' =>$faker->company,
                     'institute_url' =>$faker->company,
                     'institute_user_id'=>$faker->unique()->randomNumber(1,1000),
                     'institute_website' =>$faker->url,
                     'institute_fblink' =>$faker->userName,
                     'institute_twitter' =>$faker->userName,
                     'institute_description'=>$faker->text(),
                     'institute_rating' =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5),
                     'institute_photo'=>"0",
                     ));
              }
       }
}
?>