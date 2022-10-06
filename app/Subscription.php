<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = ['plan_name', 'plan_duration', 'plan_time', 'plan_price', 'plan_description','subscription_image','price_id' ];
}
