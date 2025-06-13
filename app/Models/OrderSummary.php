<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSummary extends Model
{
    use HasFactory;
    protected $table = 'order_summary_view'; // ใช้ชื่อ View แทน Table

    public $incrementing = false; // ถ้าไม่มี auto-increment id
    public $timestamps = false;   // เพราะ View ไม่สามารถ update ได้

    protected $fillable = [
        'order_id',
        'customer_name',
        'total_price',
        'created_at',
        'updated_at',
    ];

    public function orderitems()
    {
        return $this->hasMany(Orderitems::class, 'order_id','order_id')->with('drinks');
    }
}
