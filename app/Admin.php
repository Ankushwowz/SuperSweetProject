<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $table = 'admins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin_avatar',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        // When the admin is being deleted, delete the image as well.
        static::deleting(function (Admin $admin) {
            $attributes = $admin->getAttributes();
            if (isset($attributes['admin_avatar']) && $attributes['admin_avatar']) {
                Storage::delete($attributes['admin_avatar']);
            }
        });
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/' . $value : '/images/default.png');
    }
}