<?php
 
class BatchesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,1000) as $index)
              {            
                     DB::table('batches')->insert(array(
                     'batch' => $faker->Name,
                     'batch_category_id'=>$faker->randomNumber(1,10),
                     'batch_subcategory_id'=>$faker->randomNumber(1,30),
                     'batch_accomplishment' =>$faker->text(),
                     'batch_user_id'=>$faker->unique()->randomNumber(1,1000),
                     'batch_institute_id'=>$faker->randomNumber(1,30),
                     'batch_venue_id'=>$faker->randomNumber(1,30),
                     'batch_difficulty_level' =>$faker->randomNumber(1,4),
                     'batch_age_group' =>$faker->randomNumber(1,3),
                     'batch_gender_group' =>$faker->randomNumber(1,3),
                     'batch_single_price' =>$faker->randomNumber(1000,5000),
                     'batch_recurring' =>$faker->randomNumber(1,4),
                     'batch_approved' =>$faker->boolean(),
                     'batch_trial' =>$faker->randomNumber(1,5),
                     'batch_comment'=>$faker->lexify(),
                     'batch_tagline'=>$faker->lexify(),
                     'batch_photo'=>"0",
                     ));
              }
       }
}
