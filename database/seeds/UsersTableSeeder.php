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
        App\User::insert(
            array([
                'name'=>'admin',
                'email'=>'admin',
                'password'=>bcrypt('admin'),
            ],
            [
                'name'=>'resto',
                'email'=>'resto',
                'password'=>bcrypt('resto'),
            ],
            [
                'name'=>'petugas',
                'email'=>'petugas',
                'password'=>bcrypt('petugas'),
            ],
            [
                'name'=>'laundry',
                'email'=>'laundry',
                'password'=>bcrypt('laundry'),
            ])

        );
    }
}
