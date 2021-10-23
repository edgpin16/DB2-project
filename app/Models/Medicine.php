<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'serial_number';

    public $incrementing = false;

    protected $fillable = [
        'serial_number',
        'laboratory_id',
        'name_medicine',
        'presentation',
        'main_component',
        'therapeutic_action',
        'price',
    ];

    protected $hidden = [
        'serial_number',
        'laboratory_id',
    ];

    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
