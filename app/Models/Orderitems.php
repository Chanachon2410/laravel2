<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitems extends Model
{
    public $timestamps = false;
    protected $table = 'orderitems';
    protected $primaryKey = 'id';
    use HasFactory;

    protected $fillable = [
        'order_id',
        'drinks_id',
        'quantity'
    ];

    // ความสัมพันธ์กับ Drinks
    public function drinks()
    {
        return $this->belongsTo(Drinks::class, 'drinks_id')->with('typedrinks');
    }
}
