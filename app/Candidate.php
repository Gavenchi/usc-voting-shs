<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Candidate extends Model
{
    protected $fillable = ['name', 'image', 'party_id', 'position_id', 'campus_id'];

    public function position() {
        return $this->belongsTo('App\Position');
    }

    public function votes() {
        return $this->hasMany('App\Vote');
    }

    public function party() {
        return $this->belongsTo('App\Party');
    }
    
}
