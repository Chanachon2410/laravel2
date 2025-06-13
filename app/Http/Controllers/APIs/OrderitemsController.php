<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Drinks;
use App\Models\Orderitems;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderitemsController extends Controller
{
    public function deleteDrink($id)
    {
        // 1. ลบโดยตรงด้วย destroy
        $deletedRows = Orderitems::destroy($id);

        if ($deletedRows === 0) {
            // ถ้าไม่มีการลบ (เพราะ id ไม่เจอ)
            return response()->json([
                'status' => 'error',
                'message' => 'OrderItem not found!'
            ], 404);
        }

        // 2. คืนค่า response ถ้าลบสำเร็จ
        return response()->json([
            'status' => 'success',
            'message' => 'OrderItem deleted successfully!'
        ], 200);
    }

    public function editQuantity(Request $request, $id)
    {
        $orderItem = Orderitems::find($id);

        if (!$orderItem) {
            return response()->json([
                'status' => 'error',
                'message' => 'OrderItem not found!'
            ], 404);
        }

        if ($request->has('quantity')) {
            $orderItem->quantity = $request->input('quantity');
        }

        $orderItem->save();

        // ลองดึง record ใหม่จาก DB ดู
        $orderItemFresh = Orderitems::find($id);

        return response()->json([
            'status' => 'success',
            'message' => 'OrderItem updated successfully!',
            'data' => $orderItemFresh
        ], 200);
    }

    public function editDrink(Request $request, $id)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $validated = $request->validate([
            'drinks_id' => 'required|exists:drinks,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // หาว่า orderitem นี้มีอยู่ไหม
        $orderItem = Orderitems::find($id);
        if (!$orderItem) {
            return response()->json([
                'message' => 'ไม่พบรายการ orderitem ที่ระบุ'
            ], 404);
        }

        // อัปเดตข้อมูล
        $orderItem->update([
            'drinks_id' => $validated['drinks_id'],
            'quantity' => $validated['quantity']
        ]);

        $orderItem->load('drinks');

        return response()->json([
            'message' => 'อัปเดตรายการ orderitem สำเร็จ',
            'order_item' => $orderItem
        ]);
    }   
}
