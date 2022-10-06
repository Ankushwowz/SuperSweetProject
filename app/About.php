<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'aboutus';

    protected $fillable = ['name', 'about_description','about_image'];
}
