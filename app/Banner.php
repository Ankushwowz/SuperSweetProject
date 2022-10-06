<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = ['title', 'slider','title2','footeryear'];
	
	 protected static function booted()
    {
        static::deleting(function (Banner $banner) {
            $attributes = $banner->getAttributes();
            Storage::delete($attributes['slider']);
        });
    }
}
