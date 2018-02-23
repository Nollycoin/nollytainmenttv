<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'website_name', 'website_title', 'website_description', 'website_keywords', 'paypal_email',
        'subscription_name', 'subscription_price', 'subscription_currency', 'disquis_short_name',
        'jwplayer_key', 'facebook_url', 'twitter_url'
    ];

}
