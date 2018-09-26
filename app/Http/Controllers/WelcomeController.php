<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Http\Models\User;

class WelcomeController extends Controller
{
    /**
    * Calculates the great-circle distance between two points, with
    * the Vincenty formula.
    * @param float $latitudeFrom Latitude of start point in [deg decimal]
    * @param float $longitudeFrom Longitude of start point in [deg decimal]
    * @param float $latitudeTo Latitude of target point in [deg decimal]
    * @param float $longitudeTo Longitude of target point in [deg decimal]
    * @param float $earthRadius Mean earth radius in [m]
    * @return float Distance between points in [m] (same as earthRadius)
    */
    public static function getDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
    // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad((float)$latitudeTo);
        $lonTo = deg2rad((float)$longitudeTo);
  
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
        pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
  
        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
    }

    private function getLocationInfo(){
        // Устанавливаем позицию пользователя для первичного отбора анкет в качестве первичного предложения
        $user_ip = Request::ip();
        if ($user_ip == "127.0.0.1") {
            $externalContent = file_get_contents('http://checkip.dyndns.com/');
            preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
            $externalIp = $m[1];
            $user_ip = $externalIp;
        }
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $info['country'] = $geo["geoplugin_countryName"];
        $info['city'] = $geo["geoplugin_city"];
        $info['latitude'] = $geo["geoplugin_latitude"];
        $info['longitude'] = $geo["geoplugin_longitude"];
        return $info;
    }

    public function index(){
        
        $info = $this->getLocationInfo();

        // Выбираем отдельно пользователей мужчин и женщин для сортировки по удаленности
        $all_mens = User::where([
            ['country', '=', $info['country']],
            ['city', '=', $info['city']],
            ['gender', '=', 'male']
        ])->get();

        if (!count($all_mens)){
            $all_mens = User::where([
                ['country', '=', $info['country']],
                ['gender', '=', 'male']
            ])->get();
        }

        $all_women = User::where([
            ['country', '=', $info['country']],
            ['city', '=', $info['city']],
            ['gender', '=', 'female']
        ])->get();

        if (!count($all_women)){
            $all_women = User::where([
                ['country', '=', $info['country']],
                ['gender', '=', 'female']
            ])->get();
        }
        
        // Для каждого массива устанавливаем расстояния между пользователями
        $users = array();
        if (count($all_women) && count($all_mens)){
        $nearest_people = array();

        foreach ($all_mens as $user) {
            $nearest_men[$user->id] = $this->getDistance($info['latitude'], $info['longitude'], $user->latitude, $user->longitude);
        }

        
        asort($nearest_men);
        

        foreach ($all_women as $user) {
            $nearest_women[$user->id] = $this->getDistance($info['latitude'], $info['longitude'], $user->latitude, $user->longitude);
        }
        asort($nearest_women);

        $nearest_men = array_chunk($nearest_men, '3', $preserve_keys = TRUE)[0];
        $nearest_women = array_chunk($nearest_women, '3', $preserve_keys = TRUE)[0];
        $nearest_people = $nearest_men + $nearest_women;
        // asort($nearest_people);
        $keys = array_keys($nearest_people);
        asort($keys);
        ksort($nearest_people);
        $ar = array_values($nearest_people);

        // Добавляем значение дистанции для каждого юзера
        $i = 0;
        $users = USER::whereIn('id', $keys)->get();
        foreach($users as $user){
            $user->distance = round($ar[$i] / 1000, 1) . "km";
            $i++;
        }
    }
        return view('welcome', [
            'nearest_people' => $users
        ]);
    }
}
