<?php
 
class CommentsTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,30) as $index)
              { 
                     DB::table('comments')->insert(array(
                     'comment_user_id' =>$faker->randomNumber(1,30),
                     'comment_institute_id' =>$faker->randomNumber(1,30),
                     'comment' =>$faker->text(),
                     'comment_rating' =>$faker->randomNumber(1,5),
                     ));
              }
       }
}
?>