<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'billing_cycle',
        'is_popular',
        'is_active',
        'sort_order',
    ];

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
