<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypedrinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            DB::table('typedrinks')->insert([
                ['name' => 'กาแฟ', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'ชา', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'น้ำผลไม้', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'น้ำอัดลม', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'สมูทตี้', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
