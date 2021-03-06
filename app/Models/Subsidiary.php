<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacy_id',
        'name',
        'slug',
        'city',
        'province',
    ];

    protected $hidden = [
        'pharmacy_id',
    ];

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function employeers (){
        return $this->hasMany(Employeer::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function debtsToPays(){
        return $this->hasMany(DebtsToPay::class);
    }

    public function subsidiaryStocks(){
        return $this->hasMany(SubsidiaryStock::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
