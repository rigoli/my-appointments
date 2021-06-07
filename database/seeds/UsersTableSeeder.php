<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Roberto Salazar Cervantes',
            'email' => 'dev@srgorila.com',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Lesli Ramirez Zepeda',
            'email' => 'patient@srgorila.com',
            'password' => bcrypt('secret'),
            'role' => 'patient'
        ]);

        User::create([
            'name' => 'Alexandra Barron Carrillo',
            'email' => 'doctor@srgorila.com',
            'password' => bcrypt('secret'),
            'role' => 'doctor'
        ]);
        factory(User::class, 50)->create();
    }
}
