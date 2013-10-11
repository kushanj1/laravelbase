<?php
class UserTableSeeder extends Seeder {

	public function run()
	{
	// !!! All existing users are deleted !!!
	//         DB::table('users')->delete();
	//
		User::create(array(
			'fullname'  => 'Administrator',
			'password'  => Hash::make('adminpassword'),
			'email'     => 'kushanj1@gmail.com'
			));
	}
}
