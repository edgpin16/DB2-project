<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pharmaceutist;
use App\Models\Intern;
use App\Models\Certificate;

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

    public function pharmaceutist(){
        return $this->hasOne(Pharmaceutist::class);
    }

    public function pharmaceutistCertificate(){
        return $this->hasOneThrough(Certificate::class, Pharmaceutist::class);
    }

    public function intern(){
        return $this->hasOne(Intern::class);
    }

}
