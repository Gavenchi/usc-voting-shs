<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'position_id', 'candidate_id', 'ip_address'];

    public function candidate() {
        return $this->belongsTo('App\Candidate');
    }
}
