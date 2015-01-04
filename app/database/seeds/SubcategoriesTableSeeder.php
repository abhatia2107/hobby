<?php
 
class SubcategoriesTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,10) as $index)
              { 
                     foreach (range(1, 5) as $i) {
                            DB::table('subcategories')->insert(array(
                            'subcategory_category_id'=>$index,
                            'subcategory'=>$faker->name,
                            ));
                     }       
              }
       }
}
?>