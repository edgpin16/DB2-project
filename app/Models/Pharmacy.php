<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function subsidiaries (){
        return $this->hasMany(Subsidiary::class);
    }

}
