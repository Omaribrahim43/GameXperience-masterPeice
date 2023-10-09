<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DeviceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('device_types')->insert([
            [
                'type' => 'PC',
                'image' => 'https://cdn-icons-png.flaticon.com/512/4703/4703650.png',
                'description' => 'Gaming computers',
                'status' => 'active',
            ],
            [
                'type' => 'PS5',
                'image' => 'https://static.thenounproject.com/png/4574709-200.png',
                'description' => 'Play Station 5',
                'status' => 'active',
            ],
            [
                'type' => 'PS4',
                'image' => 'https://www.pngitem.com/pimgs/m/17-174940_video-game-console-with-gamepad-ps4-controller-icon.png',
                'description' => 'Play Station 4',
                'status' => 'active',
            ],
            [
                'type' => 'XBOX',
                'image' => 'https://cdn-icons-png.flaticon.com/512/1/1321.png',
                'description' => 'Xbox',
                'status' => 'active',
            ]
        ]);
    }
}
