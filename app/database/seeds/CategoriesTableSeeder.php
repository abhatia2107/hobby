<?php
 
class CategoriesTableSeeder extends Seeder {

       public function run()
       {
              DB::table('Categories')->insert(array(
              'category' =>'Art & Craft',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Cooking',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Dance',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Education',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Fitness',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Media',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Music',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Professional',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Sports',
              ));
              DB::table('Categories')->insert(array(
              'category' =>'Technology',
              ));
       }
}
?>