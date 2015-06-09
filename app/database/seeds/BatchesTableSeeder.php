<?php
 
class BatchesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,50) as $index)
              {            
                     DB::table('batches')->insert(array(
                     // 'batch' => $faker->Name,
                     'batch_category_id'=>1,
                     'batch_subcategory_id'=>2,
                     // 'batch_accomplishment' =>$faker->text(),
                     'batch_user_id'=>$index+3,//$faker->unique()->randomNumber(1,1000),
                     'batch_institute_id'=>$index,//$faker->randomNumber(1,30),
                     'batch_venue_id'=>$index,//$faker->randomNumber(1,30),
                     // 'batch_difficulty_level' =>$faker->randomNumber(1,4),
                     // 'batch_age_group' =>$faker->randomNumber(1,3),
                     // 'batch_gender_group' =>$faker->randomNumber(1,3),
                     // 'batch_single_price' =>$faker->randomNumber(1000,5000),
                     // 'batch_recurring' =>$faker->randomNumber(1,4),
                     'batch_approved' =>1,//$faker->boolean(),
                     // 'batch_trial' =>$faker->randomNumber(1,3),
                     // 'batch_comment'=>$faker->lexify(),
                     // 'batch_tagline'=>$faker->lexify(),
                     // 'shower_room' =>$faker->boolean(),
                     // 'steam' =>$faker->boolean(),
                     // 'air_conditioning' =>$faker->boolean(),
                     // 'locker_room' =>$faker->boolean(),
                     // 'changing_room' =>$faker->boolean(),
                     // 'cafe' =>$faker->boolean(),
                     // 'batch_photo'=>"0",
                     ));
              }
       }
}
