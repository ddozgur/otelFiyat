<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Grand Hotel',
                'city' => 'Istanbul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ocean View Resort',
                'city' => 'Antalya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain Lodge',
                'city' => 'Trabzon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luxury Suites',
                'city' => 'Izmir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'City Center Inn',
                'city' => 'Ankara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
