<?php
 
class CategoriesTableSeeder extends Seeder {

       public function run()
       {
              /*DB::table('categories')->insert(array(
              'category' =>'Art & Craft',
              'category_no_of_subcategories'=>20,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Cooking',
              'category_no_of_subcategories'=>33,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Dance',
              'category_no_of_subcategories'=>21,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Education',
              'category_no_of_subcategories'=>11,
              ));
              */
              DB::table('categories')->insert(array(
              'category' =>'Fitness',
              'category_no_of_subcategories'=>18,
              ));
              /*DB::table('categories')->insert(array(
              'category' =>'Media',
              'category_no_of_subcategories'=>3,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Music',
              'category_no_of_subcategories'=>13,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Professional',
              'category_no_of_subcategories'=>4,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Sports',
              'category_no_of_subcategories'=>15,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Technology',
              'category_no_of_subcategories'=>4,
              ));
              DB::table('categories')->insert(array(
              'category' =>'Other',
              'category_no_of_subcategories'=>1,
              ));
              */
       }
}