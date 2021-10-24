<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'subsidiary_id',
        'laboratory_id',
        'analist',
        'payment_type',
        'payment_date',
        'status',
    ];

    protected $hidden = [
        'subsidiary_id',
        'laboratory_id',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
    }

    public function debtsToPay(){
        return $this->hasOne(DebtsToPay::class);
    }

}
