<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'name' => 'Mt. Everest',
            'price' => '1500',
            'amenities' => [
                'bed' => '1 Double Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside Table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Everest.jpg',
        ]);

        Room::create([
            'name' => 'Dhaulagiri',
            'price' => '2000',
            'amenities' => [
                'bed' => '1 Double Bed & 1 Single Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '2 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Dhaulagiri.jpg',
        ]);

        Room::create([
            'name' => 'Kanchenjunga',
            'price' => '2000',
            'amenities' => [
                'bed' => '1 Double Bed & 1 Single Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '2 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Kanchenjungaa.jpg',
        ]);
        Room::create([
            'name' => 'Langtang',
            'price' => '1500',
            'amenities' => [
                'bed' => '1 Double Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Langtang.jpg',
        ]);
        Room::create([
            'name' => 'Manaslu',
            'price' => '1500',
            'amenities' => [
                'bed' => '3 Single Bed',
                'bath' => 'N/A',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Manaslu.jpg',
        ]);

        Room::create([
            'name' => 'Annapurna',
            'price' => '2000',
            'amenities' => [
                'bed' => '4 Single Bed',
                'bath' => 'N/A',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '3 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Annapurna.jpg',
        ]);
        Room::create([
            'name' => 'Thamserku',
            'price' => '1500',
            'amenities' => [
                'bed' => '3 Single Bed',
                'bath' => 'N/A',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '3 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Thamserku.jpg',
        ]);
        Room::create([
            'name' => 'Macchapuchre',
            'price' => '2500',
            'amenities' => [
                'bed' => '5 Single Bed',
                'bath' => 'N/A',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '3 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Macchapuchre.jpg',
        ]);
        Room::create([
            'name' => 'Makalu',
            'price' => '1500',
            'amenities' => [
                'bed' => '5 Single Bed',
                'bath' => 'N/A',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '3 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Makalu.jpg',
        ]);
        Room::create([
            'name' => 'Gaurishankar',
            'price' => '1500',
            'amenities' => [
                'bed' => '1 Double Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Gaurishankar.jpg',
        ]);
        Room::create([
            'name' => 'Api',
            'price' => '1500',
            'amenities' => [
                'bed' => '1 Double Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Api.jpg',
        ]);
        Room::create([
            'name' => 'Nilgiri',
            'price' => '2000',
            'amenities' => [
                'bed' => '4 Single Bed',
                'bath' => 'N/A',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '4 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Nilgirii.jpg',
        ]);
        Room::create([
            'name' => 'Ama Dablam',
            'price' => '1500',
            'amenities' => [
                'bed' => '1 Double Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Ama Dablam.jpg',
        ]);
        Room::create([
            'name' => 'Lhotse',
            'price' => '2000',
            'amenities' => [
                'bed' => '4 Single Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'N/A',
            ],
            'photo' => 'Lhotse.jpg',
        ]);
        Room::create([
            'name' => 'Numbur',
            'price' => '1500',
            'amenities' => [
                'bed' => '1 Double Bed',
                'bath' => 'Attach Bathroom',
                'table' => '1 Table',
                'chair' => '1 Chair',
                'bedsideTable' => '1 Bedside table',
                'cupboard' => 'Cupboard',
            ],
            'photo' => 'Numbur.jpg',
        ]);
    }
}
