<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Intern;
use App\Models\TutorMinorInter;

class MinorInter extends Model
{
    use HasFactory;

    protected $fillable = [
        'intern_id',
        'licence_number',
    ];

    protected $hidden = [
        'intern_id',
    ];

    public function intern(){
        return $this->hasOne(Intern::class);
    }

    public function tutorMinorInter(){
        return $this->belongsTo(TutorMinorInter::class);
    }

}
