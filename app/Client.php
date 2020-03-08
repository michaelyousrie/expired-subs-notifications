<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Client extends Model
{
    protected $fillable = [
        'name', 'join_date', 'sub_end_date', 'bundle_name'
    ];

    protected $dates = [
        'join_date', 'sub_end_date'
    ];

    public function hasExpired()
    {
        return now() > $this->sub_end_date;
    }

    public function isAboutToExpire()
    {
        return !$this->hasExpired() && $this->join_date->diffInDays($this->sub_end_date) <= 7;
    }

    public function scopeExpired(Builder $q)
    {
        $q->whereDate('sub_end_date', '<', now());
    }
}
