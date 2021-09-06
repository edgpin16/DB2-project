<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    use HasFactory;

    protected $primaryKey = 'CI';

    public $incrementing = false;

    protected $fillable = [
        'CI',
        'subsidiary_id',
        'name',
        'surname',
        'date_birth',
        'salary',
        'category',
    ];

    protected $hidden = [
        'CI',
        'subsidiary_id',
    ];

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

}
