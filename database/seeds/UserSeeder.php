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
        DB::table('users')->insert([
            'name'=>'Super Admin',
            'role_id'=>'1',
            'email'=>'superadmin@orios.com',
            'password'=>bcrypt('superadmin123'),
        ]);
        DB::table('users')->insert([
            'name'=>'Admin',
            'role_id'=>'2',
            'email'=>'admin@orios.com',
            'password'=>bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name'=>'User',
            'role_id'=>'3',
            'email'=>'user@orios.com',
            'password'=>bcrypt('user123'),
        ]);
        DB::table('users')->insert([
            'name'=>'Applicant',
            'role_id'=>'4',
            'email'=>'applicant@orios.com',
            'password'=>bcrypt('applicant123'),
        ]);
    }
}
