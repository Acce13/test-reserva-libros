<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::table('users')->insert([
            'name' => 'Usuario 1',
            'email' => 'usuario1@hotmail.com',
            'password' => Hash::make('1234567890'),
            'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario 2',
            'email' => 'usuario2@hotmail.com',
            'password' => Hash::make('1234567890'),
            'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
        ]);
    }
}
