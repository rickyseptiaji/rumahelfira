<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = ['solution'];

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
