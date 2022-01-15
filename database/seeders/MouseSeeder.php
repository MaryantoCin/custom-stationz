<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Logitech G102', 'brand' => 'Logitech', 'description' => 'G102 is inspired by the classic design of the legendary Logitech G100S Gaming Mouse. Beloved by gamers worldwide and a favorite of esports pros, it’s a classic design that we’ve re-engineered and optimized from the inside-out to be lightweight, durable and comfortable.'],
            ['id' => 2, 'name' => 'Fantech Helios XD3', 'brand' => 'Fantech', 'description' => 'Fantech HELIOS XD3 designed with 4 RGB spectrum modes, You can set it to RGB colors that you like, to enchance your gaming experience.'],
            ['id' => 3, 'name' => 'Rexus Daxa Air II Wireless', 'brand' => 'Rexus', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dolor arcu, viverra at velit id, dictum ullamcorper libero. Ut fringilla a velit at venenatis. Etiam lacinia diam vel nisi tristique venenatis.'],
        ];

        DB::table('mice')->insert($data);
    }
}
