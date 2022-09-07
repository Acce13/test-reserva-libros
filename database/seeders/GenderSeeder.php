<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(['Aventuras', 'Ciencia Ficción', 'Policíaca', 'Terror y misterio'])->map(function ($item, $key) {
            DB::table('genders')->insert([
                'gender' => $item,
                'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
            ]);
        });
    }
}
