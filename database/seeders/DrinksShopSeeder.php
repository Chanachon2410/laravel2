<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinksShopSeeder extends Seeder
{
    public function run()
    {
        // 1. สร้างลูกค้า 10 คน
        $customerIds = [];
        for ($i = 1; $i <= 10; $i++) {
            $customerIds[] = DB::table('customers')->insertGetId([
                'name' => 'Customer ' . $i,
                'phone' => '08' . rand(10000000, 99999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. สร้างประเภทเครื่องดื่ม (typedrinks) 3 รายการ
        $typeDrinkIds = [];
        $typedrinkNames = ['กาแฟ', 'ชา', 'น้ำอัดลม'];
        foreach ($typedrinkNames as $name) {
            $typeDrinkIds[] = DB::table('typedrinks')->insertGetId([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. สร้างเครื่องดื่ม (drinks) 10 รายการ แบบสุ่มจับคู่ประเภทเครื่องดื่ม
        $drinkIds = [];
        for ($i = 1; $i <= 10; $i++) {
            $drinkIds[] = DB::table('drinks')->insertGetId([
                'name' => 'Drink ' . $i,
                'typedrinks_id' => $typeDrinkIds[array_rand($typeDrinkIds)],
                'price' => rand(20, 100),
                'created_at' => now(),
                'updated_at' => now(),
                // ถ้ามี typedrinks_id ให้ใส่ด้วย เช่น
                // 'typedrink_id' => $typeDrinkIds[array_rand($typeDrinkIds)],
            ]);
        }

        // $drinkIds = [];
        // for ($i = 1; $i <= 10; $i++) {
        //     $drinkIds[] = DB::table('drinks')->insertGetId([
        //         'name' => 'Drink ' . $i,
        //         'typedrinks_id' => rand(1, 3), // กำหนดให้สุ่มแค่ค่า 1 ถึง 3 เท่านั้น
        //         'price' => rand(20, 100),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }


        // 4. สร้างออเดอร์ 15 รายการ โดยสุ่มลูกค้า
        $orderIds = [];
        for ($i = 1; $i <= 15; $i++) {
            $orderIds[] = DB::table('orders')->insertGetId([
                'customer_id' => $customerIds[array_rand($customerIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 5. สร้าง orderitems 1-4 รายการต่อออเดอร์
        foreach ($orderIds as $orderId) {
            $itemCount = rand(1, 4);
            for ($j = 0; $j < $itemCount; $j++) {
                DB::table('orderitems')->insert([
                    'order_id' => $orderId,
                    'drinks_id' => $drinkIds[array_rand($drinkIds)],
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}
