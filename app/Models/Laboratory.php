<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'country',
        'province',
        'city',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function medicines(){
        return $this->hasMany(Medicine::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

}
