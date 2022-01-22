<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MouseVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['mouse_id' => 1, 'stock' => 100, 'color' => 'white', 'price' => 499000],
            ['mouse_id' => 1, 'stock' => 100, 'color' => 'black', 'price' => 499000],
            ['mouse_id' => 2, 'stock' => 100, 'color' => 'white', 'price' => 499000],
            ['mouse_id' => 2, 'stock' => 100, 'color' => 'black', 'price' => 499000],
            ['mouse_id' => 3, 'stock' => 100, 'color' => 'white', 'price' => 499000],
            ['mouse_id' => 3, 'stock' => 100, 'color' => 'black', 'price' => 499000],
        ];

        DB::table('mouse_variants')->insert($data);
    }
}
