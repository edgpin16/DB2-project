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
        'name_medicine',
        'presentation',
        'main_component',
        'therapeutic_action',
    ];

    protected $hidden = [
        'serial_number',
    ];


}
