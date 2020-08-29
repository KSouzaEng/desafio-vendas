<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::FirstOrCreate(
            [
            'email' => 'admin@email.com',
            ],
            [
                'name' => 'administrator',
                'password' => bcrypt('12345678')
            ]
    );
    }
}
