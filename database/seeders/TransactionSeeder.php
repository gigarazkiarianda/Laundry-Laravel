<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'laundry_id' => 1,  // Assuming the first laundry entry has ID 1
                'payment_status' => 'belum lunas',
                'amount' => 50000,
                'shift_id' => 1,  // Assuming shift ID is 1
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
