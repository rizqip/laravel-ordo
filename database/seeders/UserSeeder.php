<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                [
                    'name' => 'Ahmad Rizqi Pratama',
                    'email' => 'ahmadrizqip10@gmail.com',
                    'password' => Hash::make('rizqi'),
                    'address' => 'Perumahan Sidorahayu Blok C nomor 45 Wagir Malang',
                    'phone_number' => '085814786703',
                    'role' => 'admin',
                    'gender' => 'MEN',
                    'image' => 'default.jpg',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],[
                    'name' => 'admin1',
                    'email' => 'admin1@gmail.com',
                    'password' => Hash::make('admin'),
                    'address' => '',
                    'phone_number' => '',
                    'role' => 'admin',
                    'gender' => 'MEN',
                    'image' => 'default.jpg',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],[
                    'name' => 'user1',
                    'email' => 'user1@gmail.com',
                    'password' => Hash::make('user'),
                    'address' => '',
                    'phone_number' => '',
                    'role' => 'user',
                    'gender' => 'MEN',
                    'image' => 'default.jpg',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            )
        );
    }
}
