<?php
 
class UsersTableSeeder extends Seeder {

       public function run()
       {
              $faker = Faker\Factory::create();
              $faker->addProvider(new Faker\Provider\en_US\Person($faker));
       
              DB::table('users')->insert(array(
              'id' => '1',
              'user_first_name' => "Jatin",
              'user_last_name' => "Bansal",
              'email' => "jatinbansal7@gmail.com",
              'user_contact_no' => "9885890640",
              'password' => Hash::make('jatinbansal'),
              'user_location'=>"Hyderabad",
              'user_gender'=>"male",
              'user_confirmed' =>true,
              'user_referral_code'=>$faker->unique()->bothify('???##?'),
              'user_subscription_token' =>true,
              ));
       
              DB::table('users')->insert(array(
              'id' => '2',
              'user_first_name' => "Abhishek",
              'user_last_name' => "Bhatia",
              'email' => "abhatia2107@gmail.com",
              'user_contact_no' => "9729725987",
              'password' => Hash::make('abhishek'),
              'user_location'=>"Kurukshetra",
              'user_gender'=>"male",
              'user_confirmed' =>true,
              'user_referral_code'=>$faker->unique()->bothify('???##?'),
              'user_subscription_token' =>true,
              ));
              
              DB::table('users')->insert(array(
              'id' => '3',
              'user_first_name' => "Harikrishna",
              'user_last_name' => "Salver",
              'email' => "76hari@gmail.com",
              'user_contact_no' => "9494059837",
              'password' => Hash::make('harikrishna'),
              'user_location'=>"Basar",
              'user_gender'=>"male",
              'user_confirmed' =>true,
              'user_referral_code'=>$faker->unique()->bothify('???##?'),
              'user_subscription_token' =>true,
              ));
              
              foreach(range(1,30) as $index)
              {
                     DB::table('users')->insert(array(
                     'id'=>$index+3,
                     // 'user_first_name' => $faker->firstName,
                     // 'user_last_name' =>$faker->lastName,
                     'email' =>'noemail'.$index.'@hobbyix.com',
                     // 'user_contact_no' => $faker->phoneNumber,
                     'password' => Hash::make('qwerty123'),
                     'user_location'=>"Hyderabad",
                     'user_referral_code'=>$faker->unique()->bothify('???##?'),
                     'user_confirmed' =>1,
                     'user_subscription_token' =>0,
                     'user_photo'=>"0"
                     ));
              }
       
       }
}
