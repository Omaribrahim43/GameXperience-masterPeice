<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LoungesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lounges')->insert([
            [
                'name' => 'Compu Gaming Center',
                'agent_id' => 2,
                'description' => 'Gaming Center 24/7 Network Gaming Center and PS5.',
                'address' => 'Abdullah Bin Rawahah St 17 Al Rabyeh, Amman, Jordan Amman',
                'phone' => '07 9546 7754',
                'image' => 'https://lh3.googleusercontent.com/p/AF1QipOO_7CLmsYruoMbxvg7rTMZtjr2Zxr2hj-gvz0A=s1360-w1360-h1020',
                'status' => 'active',
            ],
            [
                'name' => 'INCEPTION Gaming Center',
                'agent_id' => 2,
                'description' => 'Gaming Center 24/7 Network Gaming Center and PS5.',
                'address' => 'Abdallah Ghosheh St., Amman',
                'phone' => '07 9639 1882',
                'image' => 'https://lh3.googleusercontent.com/p/AF1QipMMKsjlJHquO-Ka-Qor1YrMmm3r8Onw0V65bx4G=s1360-w1360-h1020',
                'status' => 'active',
            ],
            [
                'name' => 'Gaming Republic',
                'agent_id' => 2,
                'description' => 'Gaming Center 24/7 Network Gaming Center and PS5.',
                'address' => 'Seqeleyah St., Amman',
                'phone' => '07 7800 5894',
                'image' => 'https://lh3.googleusercontent.com/p/AF1QipOfWes_3VoFTypuRL5rZlDSuU81oPOR8pZF4K0K=s1360-w1360-h1020',
                'status' => 'active',
            ]
        ]);
    }
}
