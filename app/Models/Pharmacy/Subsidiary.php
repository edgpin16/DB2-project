<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacy_id',
        'city',
        'province',
    ];

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

}
