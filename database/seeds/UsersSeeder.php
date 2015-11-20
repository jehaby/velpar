<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'joe',
                'email' => 'jehaby@ya.ru',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'jim',
                'email' => 'jurfin@ya.ru',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'jeffry',
                'email' => 'jeffry@ya.ru',
                'password' => bcrypt('secret')
            ],
        ];


        foreach ($users as $attributes) {

            User::create($attributes);

        }




        //
    }
}
