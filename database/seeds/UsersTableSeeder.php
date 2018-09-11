<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'     => 'Jane Doe',
            'email'    => 'jane@doe.com',
            'password' => \Illuminate\Support\Facades\Hash::make('testing'),
            'saved'    => [1, 5, 7, 9],
        ]);
    }
}
