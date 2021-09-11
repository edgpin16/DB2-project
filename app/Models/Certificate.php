<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pharmaceutist;

class Certificate extends Model
{
    use HasFactory;

    protected $primaryKey = 'registry_number';

    public $incrementing = false;

    protected $fillable = [
        'registry_number',
        'pharmaceutist_id',
        'university',
        'date_registration',
    ];

    protected $hidden = [
        'registry_number',
        'pharmaceutist_id',
    ];

    public function pharmaceutist(){
        return $this->hasOne(Pharmaceutist::class);
    }

}
