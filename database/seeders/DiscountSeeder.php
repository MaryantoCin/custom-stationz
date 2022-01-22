<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'code' => 'TEST123', 'amount' => '20000'],
            ['id' => 2, 'code' => 'TAHUNBARU', 'amount' => '50000'],
        ];

        DB::table('discounts')->insert($data);
    }
}
