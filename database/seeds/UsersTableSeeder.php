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
            'name' => 'Rigoberto González Lomelí',
            'email' => 'dev@srgorila.com',
            'password' => bcrypt('servegame'),
    
            'cedula' => '12345678',
            'address' => '',
            'phone' => '+523121231212',
            'role' => 'admin'
        ]);
        factory(User::class, 50)->create();
    }
}
