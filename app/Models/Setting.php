<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
      'title', 'email', 'number1', 'number2', 'url','facebook','twitter','instagram','youtube','image'
        ,'address'
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/setting/' . $this->image);
    }//img
}
