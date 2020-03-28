<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'answer', 'author'];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
