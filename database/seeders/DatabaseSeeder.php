<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MouseSeeder::class);
        $this->call(MouseVariantSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(DiscountSeeder::class);
    }
}
