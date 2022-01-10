<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'BCA', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['name' => 'Mandiri', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['name' => 'BRI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['name' => 'BNI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['name' => 'BCA', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
            ['name' => 'Mandiri', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
            ['name' => 'BRI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
            ['name' => 'BNI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
        ];

        DB::table('payment_methods')->insert($data);
    }
}
