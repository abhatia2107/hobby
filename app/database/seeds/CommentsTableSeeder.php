<?php
 
class CommentsTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,20) as $index)
              { 
                     DB::table('comments')->insert(array(
                     'comment_user_id' =>$faker->randomNumber(1,50),
                     'comment_institute_id' =>$faker->randomNumber(1,10),
                     'comment' =>'<p>'.$faker->paragraph(1).'<p>',
                     'comment_rating' =>$faker->randomNumber(1,5),
                     ));
              }
       }
}
?>