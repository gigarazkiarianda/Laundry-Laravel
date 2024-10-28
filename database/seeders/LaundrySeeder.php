<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laundry')->insert([
            [
                'customer_name' => 'John Doe',
                'note_number' => '123456',
                'barcode' => 'ABC123',
                'status' => 'pending',
                'price' => 50000,
                'employee_id' => 2,  // Assuming kasir1's ID is 2
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
