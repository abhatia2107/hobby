<?php
 
class UsersTableSeeder extends Seeder {
 
  public function run()
  {
  $faker = Faker\Factory::create();
  $faker->addProvider(new Faker\Provider\en_GB\Address($faker));
  $faker->addProvider(new Faker\Provider\en_GB\Internet($faker));
 

        foreach(range(1,40) as $index)
        {
            DB::table('users')->insert(array(
              'user_first_name' => $faker->firstName,
              'user_last_name' =>$faker->lastName,
              'user_email' =>$faker->email,
              'user_fb_id' =>$faker->randomNumber(15),
              'user_mobile_no' => $faker->phoneNumber,
              'user_address'=>$faker->address,
              'user_profile_pic' =>$index.'.'.'jpg',
              'user_description' =>$faker->paragraph(1),
              'birthdate' =>$faker->date,
              'gender'=>"male",
              'customer'=>$faker->boolean,
              'vendor'=>$faker->boolean,
              'tutor'=>$faker->boolean,
              'confirmation_code' =>$faker->randomNumber(1000000,100000000000),
              'confirmed' =>1,
              'user_location'=>$faker->randomDigitNotNull,
              'password' => Hash::make('123')));
        }
  }
 
}
?>