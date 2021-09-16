<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ], [
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'phone' => '0123456788',
            'password' => bcrypt('customer'),
            'role_id' => 3
        ], [
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'phone' => '0123456787',
            'password' => bcrypt('manager'),
            'role_id' => 2
        ]]);
    }
}
