<?php
 
class KeywordsTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_US\Company($faker));
              foreach(range(1,30) as $index)
              { 
                     DB::table('keywords')->insert(array(
                     'keyword'=>$faker->company,
                     ));
              }
       }
}
?>