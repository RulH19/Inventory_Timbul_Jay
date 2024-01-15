<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('manager'),
                'role' => 'manager'
            ],
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'nama' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('kasir'),
                'role' => 'kasir'
            ],
        ];
        DB::table('users')->insert($data);
    }
}
