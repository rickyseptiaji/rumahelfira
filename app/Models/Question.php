<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }
}
