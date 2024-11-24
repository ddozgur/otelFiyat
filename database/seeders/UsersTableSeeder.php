<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Ahmet Yılmaz',
                'phoneNumber' => '5551234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mehmet Kaya',
                'phoneNumber' => '5559876543',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayşe Demir',
                'phoneNumber' => '5324567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fatma Şahin',
                'phoneNumber' => '5381237890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ali Can',
                'phoneNumber' => '5339871234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
