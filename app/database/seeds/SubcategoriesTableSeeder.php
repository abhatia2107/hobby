<?php
 
class SubcategoriesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,30) as $index)
              { 
                     DB::table('subcategories')->insert(array(
                     'subcategory_category_id'=>$faker->randomDigitNotNull,
                     'subcategory'=>$faker->name,
                     ));
              }
       }
}
?>