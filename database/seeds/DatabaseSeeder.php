<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call('UserTableSeeder');
  		$this->command->info('User Table Seeded!');
    }
}
class UserTableSeeder extends Seeder {
	public function run(){
		DB::table('fundtbadmin')->delete();
		DB::table('fundtbadmin')->insert([
    'fname' 	=> 'นายราชสัน  ธิสุทอน',
    'position' 	=> 'หัวหน้าคอมพิวเตอร์ฯ',
    'username' 	=> 'ton',
    'password' 	=> bcrypt('1234'),
    'e_mail' => 'rashasanton@gmail.com',
    'tel_mobile' => 'rashasanton@gmail.com',
    'address' => 'rashasanton@gmail.com',
    'idoffice' => '0361',
		'levelg' 	=> 1,
    'visit' 		=> 1,
		'visitday' 	=> date('Y-m-d'),
  	'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	}
}
