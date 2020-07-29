<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['image',];//for column

    public $translatedAttributes = ['name', 'description'];//for lang

    protected $appends = ['image_path',];

    public function getImagePathAttribute()
    {
        return asset('uploads/category/'. $this->image);
    }//img



    public function blogs(){
        return $this->hasMany(Blog::class);
    }//blogs rel

}
