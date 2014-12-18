<?php
 
class BatchPhotoMapSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,30) as $index)
              { 
                     DB::table('batch_photo_map')->insert(array(
                     'batch_id'=>$faker->randomDigitNotNull,
                     'photo_id'=>$faker->unique()->randomNumber(1,50),
                    ));
              }
       }
}
?>