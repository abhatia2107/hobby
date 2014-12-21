<?php
 
class CategoryInstituteSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,20) as $index)
              { 
                     DB::table('category_institute')->insert(array(
                     'category_id'=>$faker->randomNumber(1,10),
                     'institute_id'=>$faker->randomNumber(1,10),
                     ));
              }
       }
}
?>