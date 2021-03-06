<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Employeer;
use App\Models\Certificate;

class Pharmaceutist extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeer_CI',
        'sanitary_permise_number',
        'schooling_number',
    ];

    protected $hidden = [
        'employeer_CI',
    ];

    public function employeer(){
        return $this->belongsTo(Employeer::class, 'CI');
    }

    public function certificate(){
        return $this->hasOne(Certificate::class);
    }

}
