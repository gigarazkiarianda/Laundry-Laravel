<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
            [
                'kasir_id' => 2,  // Assuming kasir1's ID is 2
                'start_time' => now(),
                'end_time' => null,
                'total_income' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
