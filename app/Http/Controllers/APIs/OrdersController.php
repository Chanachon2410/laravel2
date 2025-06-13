<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Orderitems;
use App\Models\Orders;
use App\Models\OrderSummary;
use App\Repositories\Eloquent\OrderSummaryRepository;
use App\Repositories\OrdersRepositoryInterface;
use App\Repositories\OrderSummaryRepositoryInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller

{
    private $ordersRepositoryInterface, $orderSummaryRepositoryInterface;
    public function __construct(OrdersRepositoryInterface $ordersRepositoryInterface, OrderSummaryRepositoryInterface $orderSummaryRepositoryInterface)
    {
        $this->ordersRepositoryInterface = $ordersRepositoryInterface;
        $this->orderSummaryRepositoryInterface = $orderSummaryRepositoryInterface;
    }

    public function orderDataTable(Request $request)
    {
        $postData = $request->all();
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page

        $columnIndex = isset($postData['order'][0]['column']) ? $postData['order'][0]['column'] : 0;
        $columnName = isset($postData['columns'][$columnIndex]['data']) ? $postData['columns'][$columnIndex]['data'] : '';
        $columnSortOrder = isset($postData['order'][0]['dir']) ? $postData['order'][0]['dir'] : 'asc';
        $searchValue = $postData['search']['value']; // Search value
        $param = [
            "columnName" => $columnName,
            "columnSortOrder" => $columnSortOrder,
            "searchValue" => $searchValue,
            "start" => $start,
            "rowperpage" => $rowperpage,
        ];

        $sherchField = [
            'order_id',
            'customer_name',
            'total_price',
            'created_at',
            'updated_at',
        ];
        $relationsship = [
            'orderItems',
        ];
        // Total records
        $totalRecordswithFilter = $totalRecords = $this->orderSummaryRepositoryInterface->getAll($param, $sherchField, $relationsship)->count();

        // Fetch records
        $records = $this->orderSummaryRepositoryInterface->paginate($param, $sherchField, $relationsship);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }
    public function deleteApi($id)
    {
        try {
            // สมมติว่า repository มีฟังก์ชัน findById
            $order = $this->ordersRepositoryInterface->find($id);
            if (!$order) {
                return response()->json([
                    'message' => 'ไม่พบคำสั่งซื้อ',
                    'code' => 404,
                ], 404);
            }

            // ลบ order
            $this->ordersRepositoryInterface->delete($id);

            return response()->json([
                'message' => 'ลบคำสั่งซื้อสำเร็จ',
                'code' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'ลบคำสั่งซื้อไม่สำเร็จ',
                'code' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function updateOrderApi(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'customer_name' => 'required|string|max:255',
        ]);

        try {
            $order = Orders::findOrFail($data['order_id']);

            $customer = $order->customers_data; // relation customers
            if ($customer) {
                $customer->name = $data['customer_name'];  // แก้เป็น name ตามฐานข้อมูลจริง
                $customer->save();
            }

            return response()->json([
                'message' => 'อัปเดตข้อมูลลูกค้า สำเร็จ',
                'code' => 200,
                'total_price' => $order->total_price,  // ส่ง total_price กลับไปด้วย
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'อัปเดตข้อมูลลูกค้า ไม่สำเร็จ',
                'code' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function viewOrderApi($id)
    {
        try {
            // 1) หา OrderSummary (เพื่อเอาข้อมูล summary เช่น ชื่อลูกค้า, ราคาสรุป)
            $orderSummary = $this->orderSummaryRepositoryInterface->find($id);
            if (!$orderSummary) {
                return response()->json([
                    'message' => 'ไม่พบคำสั่งซื้อ',
                    'code' => 404,
                ], 404);
            }

            // 2) หา Order พร้อมดึง drinks (ผ่าน orderitems)
            $order = Orders::with(['orderitems.drink', 'customers_data'])
                ->find($id);

            if (!$order) {
                return response()->json([
                    'message' => 'ไม่พบคำสั่งซื้อ',
                    'code' => 404,
                ], 404);
            }

            // 3) จัดข้อมูล drinks ที่ลูกค้าสั่ง
            $drinkList = $order->orderitems->map(function ($orderitem) {
                return [
                    'drink_id' => $orderitem->drink->id,
                    'drink_name' => $orderitem->drink->name,
                    'drink_price' => $orderitem->drink->price,
                    'quantity' => $orderitem->quantity,
                ];
            });

            // 4) เตรียมข้อมูลลูกค้า
            $customerName = $orderSummary->customer_name;

            // 5) ส่งกลับ response
            return response()->json([
                'message' => 'โหลดข้อมูลสำเร็จ',
                'code' => 200,
                'order' => [
                    'order_id' => $order->id,
                    'customer_name' => $customerName,
                    'order_date' => $order->created_at->format('Y-m-d H:i:s'),
                    'order_price' => $orderSummary->total_price,
                    'drinks' => $drinkList,
                ],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'เกิดข้อผิดพลาด',
                'code' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function show($orderId)
    {
        $order = OrderSummary::where('order_id', $orderId)->first();

        if (!$order) {
            return response()->json(['code' => 404, 'message' => 'Order not found']);
        }

        // ดึง drinks ของ order
        $orderItems = Orderitems::with('drinks')
            ->where('order_id', $orderId)
            ->get();

        $drinks = $orderItems->map(function ($item) {
            return [
                'drink_id' => $item->drinks->id,
                'drink_name' => $item->drinks->name,
                'drink_price' => $item->drinks->price,
                'quantity' => $item->quantity
            ];
        });

        // ส่งกลับ JSON
        return response()->json([
            'code' => 200,
            'order' => $order,
            'drinks' => $drinks
        ]);
    }
}
