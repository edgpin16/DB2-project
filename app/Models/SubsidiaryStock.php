<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsidiaryStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'subsidiary_id',
        'serial_number',
        'name_laboratory',
        'name_medicine',
        'presentation',
        'main_component',
        'therapeutic_action',
        'price_by_unit',
        'quantity',
    ];

    protected $hidden = [
        'subsidiary_id',
        'serial_number',
    ];

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

}
