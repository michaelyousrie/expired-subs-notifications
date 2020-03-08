<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionExpiredEmail;
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

    public function extendSubscription()
    {
        return $this->update(['sub_end_date' => now()->addYear()]);
    }

    public function notifyAboutExpiry()
    {
        /** Since we don't have a mail server, well just log that we notified the user instead. 
         * However, if a mail server has been configured...
         * Uncomment the below line to actually send an email to the client
         */

        // $this->sendExpiryEmail();

        Log::alert("Expiry email being sent to `{$this->email}`");
    }

    protected function sendExpiryEmail()
    {
        Mail::to($this->email)
            ->send(new SubscriptionExpiredEmail($this));
    }
}
