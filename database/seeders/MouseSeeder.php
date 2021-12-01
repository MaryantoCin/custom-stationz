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
            ['name' => 'Logitech G102', 'merk' => 'Logitech', 'color' => 'White', 'price' => 199000, 'stock' => 10, 'description' => 'Lorem ipsum', 'image' => 'https://static.bmdstatic.com/pk/product/large/5af92f60623e6.jpg'],
            ['name' => 'Logitech G102', 'merk' => 'Logitech', 'color' => 'Black', 'price' => 199000, 'stock' => 10, 'description' => 'Lorem ipsum', 'image' => 'https://cf.shopee.co.id/file/d56c21344d7c09516d6229cbd4b56c83'],
            ['name' => 'Fantech Helios XD3', 'merk' => 'Fantech', 'color' => 'Black', 'price' => 599000, 'stock' => 7, 'description' => 'Lorem ipsum', 'image' => 'https://fantech.id/media/catalog/product/cache/fac2e9b9cf31a91d30c294472004ecf5/m/o/mouse_gaming_helios_xd3_-_fantech_-_1_2.png'],
            ['name' => 'Fantech Helios XD3', 'merk' => 'Fantech', 'color' => 'Pink', 'price' => 599000, 'stock' => 7, 'description' => 'Lorem ipsum', 'image' => 'https://fantech.id/media/mf_webp/png/media/catalog/product/cache/6f2709609ae7e6e845c1e043f6bf8c9c/x/d/xd_mint.webp'],
            ['name' => 'Fantech Helios XD3', 'merk' => 'Fantech', 'color' => 'White', 'price' => 599000, 'stock' => 7, 'description' => 'Lorem ipsum', 'image' => 'https://fantech.id/media/mf_webp/jpg/media/catalog/product/cache/6f2709609ae7e6e845c1e043f6bf8c9c/m/o/mouse_gaming_helios_xd3_white_-_fantech_-_1.webp'],
            ['name' => 'Rexus Daxa Air II Wireless', 'merk' => 'Rexus', 'color' => 'White', 'price' => 799000, 'stock' => 3, 'description' => 'Lorem ipsum', 'image' => 'https://images.tokopedia.net/img/cache/500-square/hDjmkQ/2021/6/25/a17539f2-d8ed-49c8-9b97-1bc54ba50787.jpg'],
            ['name' => 'Rexus Daxa Air II Wireless', 'merk' => 'Rexus', 'color' => 'Black', 'price' => 799000, 'stock' => 3, 'description' => 'Lorem ipsum', 'image' => 'https://pro.rexus.id/wp-content/uploads/sites/11/2020/12/MP_DaxaAir2_02.jpg'],
        ];

        DB::table('mice')->insert($data);
    }
}
