<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'JNE', 'price' => '25000', 'type' => 'regular'],
            ['id' => 2, 'name' => 'JNE', 'price' => '55000', 'type' => 'nextday'],
            ['id' => 3, 'name' => 'JNT', 'price' => '20000', 'type' => 'regular'],
            ['id' => 4, 'name' => 'JNT', 'price' => '45000', 'type' => 'nextday'],
            ['id' => 5, 'name' => 'SiCepat', 'price' => '22000', 'type' => 'regular'],
            ['id' => 6, 'name' => 'SiCepat', 'price' => '50000', 'type' => 'nextday'],
        ];

        DB::table('deliveries')->insert($data);
    }
}
