<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'typedrinks_id'
    ];

    // ความสัมพันธ์กับ Typedrinks (ประเภทเครื่องดื่ม)
    public function typedrinks()
    {
        return $this->belongsTo(Typedrinks::class, 'typedrinks_id');
    }

    // ความสัมพันธ์กับ Orderitems (เพราะ 1 drink อาจอยู่ในหลาย orderitems)
    public function orderitems()
    {
        return $this->hasMany(Orderitems::class, 'drinks_id');
    }
}
