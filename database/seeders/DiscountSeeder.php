<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::create([
            'code' => 'patron_room30',
            'percentage' => 30,
        ]);

        Discount::create([
            'code' => 'lifetime_room25',
            'percentage' => 25,
        ]);

        Discount::create([
            'code' => 'member_room20',
            'percentage' => 20,
        ]);

        Discount::create([
            'code' => 'sherpa_room15',
            'percentage' => 15,
        ]);

        Discount::create([
            'code' => 'discount0',
            'percentage' => 0,
        ]);
    }
}
