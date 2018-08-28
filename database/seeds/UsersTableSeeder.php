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
        $user = new \App\User();
		$user->name = 'Marcelo Ramos Machado';
		$user->email = 'mr.machado@gmail.com';
		$user->password = bcrypt('123');
		$user->save();
    }
}
