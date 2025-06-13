<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typedrinks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function drinks()
    {
        return $this->hasMany(Drinks::class);
    }

}
