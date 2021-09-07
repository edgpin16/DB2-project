<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MinorInter;

class TutorMinorInter extends Model
{
    use HasFactory;

    protected $primaryKey = 'CI';

    public $incrementing = false;

    protected $fillable = [
        'CI',
        'minor_intern_id',
        'name',
        'surname',
        'date_birth',
    ];

    protected $hidden = [
        'CI',
        'minor_intern_id',
    ];

    public function minorInter(){
        return $this->hasOne(MinorInter::class);
    }

}
