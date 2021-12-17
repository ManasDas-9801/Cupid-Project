<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cupied.com',
            'password' => Hash::make('123456789'),
            'l_name' => 'Cupied',
            'google_id' => 'google_id_1234',
            'gender' => 'male',
            'anual_income' => rand(10, 300),
            'occupation' => 'private_job',
            'family_type' => 'nuclear',
            'mangalik' => 'both',
            'dob' => date('y-m-d'),
            'is_Admin'=> '1'
        ]);
        for ($i=0; $i < 5; $i++) { 
	    	User::create([
	            'name' => str::random(8),
	            'email' => str::random(12).'@mail.com',
	            'password' => bcrypt('123456'),
                'l_name' => str::random(8),
                'google_id' => str::random(8),
                'gender' => 'male',
                'anual_income' => rand(10, 300),
                'occupation' => 'private_job',
                'family_type' => 'joint',
                'mangalik' => 'no',
                'dob' => date('y-m-d'),
	        ]);
    	}
        for ($i=0; $i <15; $i++) { 
	    	User::create([
	            'name' => str::random(8),
	            'email' => str::random(12).'@mail.com',
	            'password' => bcrypt('123456'),
                'l_name' => str::random(8),
                'google_id' => str::random(8),
                'gender' => 'female',
                'anual_income' => rand(10, 300),
                'occupation' => 'goverment_job',
                'family_type' => 'joint',
                'mangalik' => 'yes',
                'dob' => date('y-m-d'),
	        ]);
    	}
        for ($i=0; $i <15; $i++) { 
	    	User::create([
	            'name' => str::random(8),
	            'email' => str::random(12).'@mail.com',
	            'password' => bcrypt('123456'),
                'l_name' => str::random(8),
                'google_id' => str::random(8),
                'gender' => 'female',
                'anual_income' => rand(10, 300),
                'occupation' => 'bussiness',
                'family_type' => 'nuclear',
                'mangalik' => 'both',
                'dob' => date('y-m-d'),
	        ]);
    	}
        
    }
}
