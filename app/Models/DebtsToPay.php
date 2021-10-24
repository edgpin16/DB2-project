<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtsToPay extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'subsidiary_id',
        'laboratory_id',
        'amount_to_pay',
    ];

    protected $hidden = [
        'order_id',
        'subsidiary_id',
        'laboratory_id',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

}
