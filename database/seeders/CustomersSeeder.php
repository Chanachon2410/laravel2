<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'สมชาย ใจดี',
                'phone' => '0811111111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'วิไลวรรณ แสงทอง',
                'phone' => '0822222222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'อดิศักดิ์ พรมมา',
                'phone' => '0833333333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ณัฐชยา อินทร์ใจ',
                'phone' => '0844444444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ชาญชัย กล้าหาญ',
                'phone' => '0855555555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
