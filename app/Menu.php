<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['menu', 'url','menu1','url1','menu2','url2'];
	
// 	 protected static function booted()
//     {
//         static::deleting(function (Banner $banner) {
//             $attributes = $banner->getAttributes();
//             Storage::delete($attributes['slider']);
//         });
//     }
}
