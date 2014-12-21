<?php
 
class SubcategoriesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,50) as $index)
              { 
                     DB::table('subcategories')->insert(array(
                     'category_id'=>$faker->randomDigitNotNull,
                     'subcategory'=>$faker->name,
                     ));
              }
       }
}
?>