<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'title' => 'GAMING PARTNER',
                'description' => 'Here in GameXperience you can find your gaming partner at the same place you are playing at!',
                'image' => 'https://htmldemo.net/bonx/bonx/assets/img/others/gaming-world1.webp',
                'background_image' => 'https://htmldemo.net/bonx/bonx/assets/img/others/gaming-world-bg1.webp',
                'status' => 'active',
            ],
            [
                'title' => 'GAME LOUNGES',
                'description' => 'We provide you all the gaming centers around, you can also search for teams playing your game!!',
                'image' => 'https://htmldemo.net/bonx/bonx/assets/img/others/gaming-world2.webp',
                'background_image' => 'https://htmldemo.net/bonx/bonx/assets/img/others/gaming-world-bg2.webp',
                'status' => 'active',
            ],
            [
                'title' => 'GAME DEVICES',
                'description' => 'GameXperience allows you to to see all device types available at the game center you chose!',
                'image' => 'https://htmldemo.net/bonx/bonx/assets/img/others/gaming-world3.webp',
                'background_image' => 'https://htmldemo.net/bonx/bonx/assets/img/others/gaming-world-bg3.webp',
                'status' => 'active',
            ]
        ]);
    }
}
