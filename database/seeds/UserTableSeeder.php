<?php 

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

	public function run() {

		User::create([
			'name'     => 'Sarav',
			'email'    => 'saravanan.m2h@gmail.com',
			'password' => bcrypt('admin123')
			]
		);
	}
}