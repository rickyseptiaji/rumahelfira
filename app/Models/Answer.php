<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'guest_id', 'correct'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function guest(){
        return $this->belongsTo(Guest::class);
    }
}
