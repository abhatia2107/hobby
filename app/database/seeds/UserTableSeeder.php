<?php
 
class UserTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_US\Person($faker));
              foreach(range(1,40) as $index)
              {
                     DB::table('user')->insert(array(
                     'user_first_name' => $faker->firstName,
                     'user_last_name' =>$faker->lastName,
                     'user_email' =>$faker->email,
                     'user_contact_no' => $faker->phoneNumber,
                     'user_password' => Hash::make('123'),
                     'user_location'=>$faker->randomDigitNotNull,
                     'user_fb_id' =>$faker->randomNumber(15),
                     'user_birthdate' =>$faker->date,
                     'user_gender'=>"male",
                     'user_remember_token'=>$faker->lexify(),
                     'user_facebook_access_token'=>$faker->lexify(),
                     'user_confirmation_code' =>$faker->randomNumber(1000000,100000000000),
                     'user_confirmed' =>1,
                     ));
              }
       }
}
?>