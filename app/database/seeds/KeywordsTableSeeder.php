<?php
 
class KeywordsTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_US\Company($faker));
              foreach(range(1,200) as $index)
              { 
                     DB::table('Keywords')->insert(array(
                     'keyword'=>$faker->company,
                     ));
              }
       }
}
?>