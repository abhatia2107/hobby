<?php
 
class CommentsTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,20) as $index)
              { 
                     DB::table('Comments')->insert(array(
                     'user_id' =>$faker->randomNumber(1,50),
                     'institute_id' =>$faker->randomNumber(1,10),
                     'comment' =>'<p>'.$faker->paragraph(1).'<p>',
                     'rating' =>$faker->randomNumber(1,5),
                     ));
              }
       }
}
?>