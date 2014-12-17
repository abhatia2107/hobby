<?php
 
class ClassesTableSeeder extends Seeder {
 
  public function run()
  {
  $faker = Faker\Factory::create();
  $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
  $faker->addProvider(new Faker\Provider\en_GB\Internet($faker));
 

          foreach(range(1,20) as $index)
          {
            
              DB::table('classes')->insert(array(
              'class_title' => $faker->Name,
              'class_type'=>"Dance",
              'class_subtype'=>"Western",
              'class_tutor'=>$faker->randomDigitNotNull,
              'class_description' =>'<p>'.$faker->paragraph(1).'<p>',
              'class_vendor'=>$faker->randomDigitNotNull,
              'class_startTimestamp' =>$faker->dateTime($format = 'd-m-Y H:i:s',$max = 'now'),
              'class_endTimestamp' => $faker->dateTime($format = 'd-m-Y H:i:s',$max = 'now'),
              'class_thumbnail'=>$index.'.'.'jpg',
              'class_banner'=>$index.'.'.'jpg',
              'class_rating' =>$faker->randomNumber(1,5),
              'class_url' =>'\/'.$faker->Name,
              'class_website' =>$faker->url,
              'class_fblink' =>$faker->userName,
              'class_twitter' =>$faker->userName,
              'class_address' =>$faker->address,
              'class_location' =>$faker->randomDigitNotNull,
              'class_contact_no' =>$faker->phoneNumber,
              'class_price' =>$faker->randomNumber(1000,2000),
              'class_latitude'=>$faker->latitude,
              'class_longitude'=>$faker->longitude,
              'class_tagline'=>$faker->lexify(),
               ));

        }
  }
 
}
?>