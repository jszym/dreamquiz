<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['active'];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function answers()
    {
        return $this->hasManyThrough('App\Answer', 'App\Question');
    }
}
