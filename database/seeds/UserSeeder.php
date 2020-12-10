<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'password' => 'admin',
              'is_admin' => '1',
            ],
            [
              'name' => 'user',
              'email' => 'user@gmail.com',
              'password' => 'user',
              'is_admin' => null,
            ]
          ];

          foreach($users as $user)
          {
              App\User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'password' => Hash::make($user['password']),
			   'is_admin' => $user['is_admin']
             ]);
           }
    }
}
