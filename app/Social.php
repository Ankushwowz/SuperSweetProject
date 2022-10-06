<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Social extends Model
{
    protected $table = 'socials';

    protected $fillable = ['icon', 'url'];
	
// 	 protected static function booted()
//     {
//         static::deleting(function (Banner $banner) {
//             $attributes = $banner->getAttributes();
//             Storage::delete($attributes['slider']);
//         });
//     }
}
