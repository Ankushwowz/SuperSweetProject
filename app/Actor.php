<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Actor extends Model
{
    //
    protected $table = 'actors';

    //protected $fillable = ['name', 'dob', 'avatar1', 'background_cover1', 'overview', 'biography'];
    protected $fillable = ['stage_name','name','last_name','modelemail','city','country','age', 'dob','gender','ethnicity','fan_link','insta_name', 'avatar1', 'background_cover1', 'overview', 'biography','email_photo','checked_age'];

    protected static function booted()
    {
        static::deleting(function (Actor $actor) {
            $attributes = $actor->getAttributes();
            Storage::delete($attributes['background_cover1']);
            Storage::delete($attributes['avatar1']);
        });
    }

    public function getAvatarAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getBackgroundCoverAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_actor');
    }
}
