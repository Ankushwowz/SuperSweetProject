<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $table = 'user_subscriptions';

    protected $fillable = ['user_id','package_id', 'subscription_id', 'customer_id', 'plan_price', 'plan_name','price_id','status','period_end'];
}
