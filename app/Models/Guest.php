<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'email', 'age', 'gender', 'province', 'regency'];

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
