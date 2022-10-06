<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $table = 'history';

    protected $fillable = ['user_id', 'film_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}