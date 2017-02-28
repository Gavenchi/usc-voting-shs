<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Candidate extends Model
{
    protected $fillable = ['name', 'image'];
    protected $file_path = 'img/candidates/';

    public function position() {
        return $this->belongsTo('App\Position');
    }

    public function votes() {
        return $this->hasMany('App\Vote');
    }

    public function party() {
        return $this->belongsTo('App\Party');
    }

    public function image_data() {
        // $file_name = snake_case($this->name);
        // $img_path = $this->file_path . $file_name . '.jpg';
        // if(!File::exists($img_path)) {
        //     $img = Image::make($this->image)->resize(500, 500);
        //     $img->save(public_path($img_path));
        // }
        // return $img_path;
        return '';
    }
}
