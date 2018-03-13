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
        DB::table('users')->delete();


		$users =

		array([

		'nivel_idnivel' => 1,
		'status_codestatus' => 1,
		'department_iddepartment' => 1,
		'name' => 'Root',
		'email' => 'root@root.com',
		'password' => Hash::make('root'),
    'api_token' => str_random(60),

		]);


		DB::table('users')->insert($users);
    }
}
