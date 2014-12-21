<?php
 
class categoriesTableSeeder extends Seeder {

       public function run()
       {
              DB::table('categories')->insert(array(
              'category' =>'Art & Craft',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Cooking',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Dance',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Education',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Fitness',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Media',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Music',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Professional',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Sports',
              ));
              DB::table('categories')->insert(array(
              'category' =>'Technology',
              ));
       }
}
?>