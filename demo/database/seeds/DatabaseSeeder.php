<?php

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
        \DB::table('admins')->insert([
           'name' => 'Nghiem Quynh',
           'email' => 'admin@gmail.com',
           'password' => bcrypt('1')
        ]);
    }
}
