<?php


namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
// use Eloquent;
// use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table = 'users';
    
    
    // public static function get_nearest_people() {
    //     $userssss = new UserModel();
    //     // $_this = new self;
    //     //     return $this->hasOne('App\Models\Location');
      
    //     $user_ip = Request::ip();
    //     if ($user_ip == "127.0.0.1") {
    //         $externalContent = file_get_contents('http://checkip.dyndns.com/');
    //         preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
    //         $externalIp = $m[1];
    //         $user_ip = $externalIp;
    //     }
    //     $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    //     $country = $geo["geoplugin_countryName"];
    //     $city = $geo["geoplugin_city"];


    //     $all_mens = $this->hasOne('App\Models\Location')->where([
    //         ['country', '=', $country],
    //         ['city', '=', $city],
    //         ['gender', '=', 'm']
    //     ])->get();

    //     return $nearest_people;
    // }
    



}
