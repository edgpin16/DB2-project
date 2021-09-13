<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MinorInter;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeer_CI',
        'university',
        'specialty',
        'start_internship',
        'end_internship',
        'continue_working',
    ];

    protected $hidden = [
        'employeer_CI',
    ];

    public function employeer(){
        return $this->belongsTo(Employeer::class);
    }

    public function minorInter(){
        return $this->belongsTo(MinorInter::class);
    }

}
