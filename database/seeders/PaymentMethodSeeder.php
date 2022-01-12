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
            ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/2560px-Bank_Central_Asia.svg.png', 'name' => 'BCA', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['logo' => 'https://logos-download.com/wp-content/uploads/2016/06/Bank_Mandiri_logo_white_bg.png', 'name' => 'Mandiri', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/2560px-BANK_BRI_logo.svg.png', 'name' => 'BRI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['logo' => 'https://rekreartive.com/wp-content/uploads/2019/04/Logo-BNI-Bank-Negara-Indonesia-46-Vector-.png', 'name' => 'BNI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'manual'],
            ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/2560px-Bank_Central_Asia.svg.png', 'name' => 'BCA', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
            ['logo' => 'https://logos-download.com/wp-content/uploads/2016/06/Bank_Mandiri_logo_white_bg.png', 'name' => 'Mandiri', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
            ['logo' => 'https://rekreartive.com/wp-content/uploads/2019/04/Logo-BNI-Bank-Negara-Indonesia-46-Vector-.png', 'name' => 'BRI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
            ['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/2560px-BANK_BRI_logo.svg.png', 'name' => 'BNI', 'number' => '5271734744', 'owner' => 'Custom Stationz', 'type' => 'virtual'],
        ];

        DB::table('payment_methods')->insert($data);
    }
}
