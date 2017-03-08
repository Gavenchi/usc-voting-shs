<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name', 'max'];
    
    public function candidates() {
        return $this->hasMany('App\Candidate');
    }

    public function campus() {
        return $this->belongsTo('App\Campus');
    }
}
