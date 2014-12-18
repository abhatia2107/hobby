<?php
 
class CategoryTableSeeder extends Seeder {

       public function run()
       {
              DB::table('category')->insert(array(
              'category' =>'Art & Craft',
              ));
              DB::table('category')->insert(array(
              'category' =>'Cooking',
              ));
              DB::table('category')->insert(array(
              'category' =>'Dance',
              ));
              DB::table('category')->insert(array(
              'category' =>'Education',
              ));
              DB::table('category')->insert(array(
              'category' =>'Fitness',
              ));
              DB::table('category')->insert(array(
              'category' =>'Media',
              ));
              DB::table('category')->insert(array(
              'category' =>'Music',
              ));
              DB::table('category')->insert(array(
              'category' =>'Professional',
              ));
              DB::table('category')->insert(array(
              'category' =>'Sports',
              ));
              DB::table('category')->insert(array(
              'category' =>'Technology',
              ));
       }
}
?>