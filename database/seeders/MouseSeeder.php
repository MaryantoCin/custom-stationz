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
            ['id' => 1, 'name' => 'Logitech G102', 'brand' => 'Logitech', 'description' => 'Lorem ipsum', 'image' => 'https://static.bmdstatic.com/pk/product/large/5af92f60623e6.jpg'],
            ['id' => 2, 'name' => 'Fantech Helios XD3', 'brand' => 'Fantech', 'description' => 'Lorem ipsum', 'image' => 'https://fantech.id/media/catalog/product/cache/fac2e9b9cf31a91d30c294472004ecf5/m/o/mouse_gaming_helios_xd3_-_fantech_-_1_2.png'],
            ['id' => 3, 'name' => 'Rexus Daxa Air II Wireless', 'brand' => 'Rexus', 'description' => 'Lorem ipsum', 'image' => 'https://pro.rexus.id/wp-content/uploads/sites/11/2020/12/MP_DaxaAir2_02.jpg'],
        ];

        DB::table('mice')->insert($data);
    }
}
