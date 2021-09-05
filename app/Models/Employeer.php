<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    use HasFactory;

    protected $primaryKey = 'CI';

    protected $incrementing = false;

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

}
