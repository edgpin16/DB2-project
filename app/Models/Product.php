<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'serial_number_medicine',
        'quantity',
    ];

    protected $hidden = [
        'order_id',
        'serial_number_medicine',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function medicine(){
        return $this->hasOne(Medicine::class, 'serial_number', 'serial_number_medicine');
    }
}
