<?php
 
class BatchesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,20) as $index)
              {            
                     DB::table('batches')->insert(array(
                     'batch' => $faker->Name,
                     'batch_category_id'=>$faker->randomDigitNotNull,
                     'batch_subcategory_id'=>$faker->randomNumber(1,20),
                     'batch_accomplishment' =>'<p>'.$faker->paragraph(1).'<p>',
                     'batch_institute_id'=>$faker->randomNumber(1,20),
                     'batch_start_date' =>$faker->date($format = 'Y-m-d', $max = 'now'),
                     'batch_end_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                     'batch_start_time' =>$faker->time($format = 'H:i:s', $max = 'now'),
                     'batch_end_time' => $faker->time($format = 'H:i:s', $max = 'now'),
                     'batch_venue_id'=>$faker->randomNumber(1,20),
                     'batch_difficulty_level' =>$faker->randomNumber(1,4),
                     'batch_age_group' =>$faker->randomNumber(0,2),
                     'batch_gender_group' =>$faker->randomNumber(0,2),
                     'batch_price' =>$faker->randomNumber(1000,5000),
                     'batch_recurring' =>$faker->boolean(),
                     'batch_approved' =>$faker->boolean(),
                     'batch_no_of_classes_in_week' =>$faker->randomNumber(1,7),
                     'batch_class_on_monday'=>$faker->boolean(),
                     'batch_class_on_tuesday'=>$faker->boolean(),
                     'batch_class_on_wednesday'=>$faker->boolean(),
                     'batch_class_on_thursday'=>$faker->boolean(),
                     'batch_class_on_friday'=>$faker->boolean(),
                     'batch_class_on_saturday'=>$faker->boolean(),
                     'batch_class_on_sunday'=>$faker->boolean(),
                     'batch_trial' =>$faker->randomNumber(0,4),
                     'batch_comment'=>$faker->lexify(),
                     'batch_tagline'=>$faker->lexify(),
                     ));
              }
       }
}
?>