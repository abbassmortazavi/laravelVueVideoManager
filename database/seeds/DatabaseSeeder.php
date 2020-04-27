<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class)->create([
            'name'=> 'Abbass',
            'email'=> 'abbassmortazavi@gmail.com',
            'password'=> bcrypt('1111'),
            'is_active' => 1
        ]);

        factory(User::class , 10)->create();
    }
}
