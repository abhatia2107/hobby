<?php
 
class InstituteTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
              $faker->addProvider(new Faker\Provider\en_GB\Internet($faker));
              $faker->addProvider(new Faker\Provider\en_US\Company($faker));
              foreach(range(1,10) as $index)
              { 
                     DB::table('institute')->insert(array(
                     'institute' =>$faker->company,
                     'institute_url' =>$faker->company,
                     'institute_website' =>$faker->url,
                     'institute_fblink' =>$faker->userName,
                     'institute_twitter' =>$faker->userName,
                     'institute_description'=>'<p>'.$faker->paragraph(1).'<p>',
                     'institute_approved'=>$faker->boolean(),
                     ));
              }
       }
}
?>