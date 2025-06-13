<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',

    ];
    public function customers_data()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitems::class, 'order_id')->with('drinks');
    }
    public function drinks()
    {
        return $this->belongsToMany(Drinks::class, 'order_drink', 'order_id', 'drink_id');
    }
}
