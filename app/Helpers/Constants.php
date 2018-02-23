<?php
/**
 * Created by PhpStorm.
 * User: pens
 * Date: 2/18/18
 * Time: 11:44 AM
 */

namespace App\Helpers;


class Constants
{

    public static function getUploadDirectory(){
        return config('constants.upload_dir');
    }

    public static function isKid(){
        return session()->has('is_kid');
    }

    public static function getCountryNameByIP($ip){
        $html = file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip);
        $html = unserialize($html);
        return $html['geoplugin_countryName'];
    }

    public static function trimNames($names)
    {
        $names = explode(' ', $names);
        $names[1] = substr($names[1], 0, 1);
        return $names[0] . ' ' . $names[1] . '.';
    }
}