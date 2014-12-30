<?php
 
class categoriesTableSeeder extends Seeder {

       public function run()
       {
              DB::table('categories')->insert(array(
              'category' =>'Art & Craft',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Cooking',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Dance',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Education',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Fitness',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Media',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Music',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Professional',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Sports',
              'category_no_of_subcategories'=>10,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Technology',
              'category_no_of_subcategories'=>10,
              ));
       }
}
?>