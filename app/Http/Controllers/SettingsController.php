<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function saveSettings(Request $request)
    {
        $this->validate($request, [
            'website_name' => 'string',
            'website_title' => 'string',
            'website_description' => 'string|min:8',
            'paypal_email' => 'email',
            'subscription_name' => 'string',
            'disquis_short_name' => 'string',
            'jwplayer_key' => 'string',
            'facebook_url' => 'url',
            'twitter_url' => 'url'
        ]);

        $settings = Setting::where('id', 1)->first();
        if ($request->has('website_name')){
            $settings->website_name = $request->get('website_name');
        }
        if ($request->has('website_title')){
            $settings->website_title = $request->get('website_title');
        }
        if ($request->has('website_description')){
            $settings->website_description = $request->get('website_description');
        }
        if ($request->has('website_keywords')){
            $settings->website_keywords = $request->get('website_keywords');
        }
        if ($request->has('paypal_email')){
            $settings->paypal_email = $request->get('paypal_email');
        }
        if ($request->has('subscription_name')){
            $settings->subscription_name = $request->get('subscription_name');
        }
        if ($request->has('subscription_price')){
            $settings->subscription_price = $request->get('subscription_price');
        }
        if ($request->has('disquis_short_name')){
            $settings->disquis_short_name = $request->get('disquis_short_name');
        }
        if ($request->has('jwplayer_key')){
            $settings->jwplayer_key = $request->get('jwplayer_key');
        }
        if ($request->has('facebook_url')){
            $settings->facebook_url = $request->get('facebook_url');
        }
        if ($request->has('twitter_url')){
            $settings->twitter_url = $request->get('twitter_url');
        }

        $settings->update();

        return redirect(route('_settings'))->with('success', 'Settings updated successfully');
    }
}
