<?php
 
class BatchKeywordSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              foreach(range(1,20) as $index)
              { 
                     DB::table('batch_keyword')->insert(array(
                     'batch_id'=>$faker->randomNumber(1,20),
                     'keyword_id'=>$faker->randomNumber(1,20),
                     ));
              }
       }
}
?>