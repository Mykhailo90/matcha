<?php

namespace App\Http\Models;

use App\Http\Controllers\WelcomeController;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;

class Search extends Model
{
    public static function sortByDistance(Request $request){
        $minAge = $request['min_age'];
        $maxAge = $request['max_age'];
        $gender = $request['gender'];
        $interests = $request['interests'];
        $maxDistacne = $request['max_distance'];
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public static function sortByAge(Request $request){
        $minAge = $request['min_age'];
        $maxAge = $request['max_age'];
        $gender = $request['gender'];
        $maxDist = $request['max_distance'];
        $interests = $request['interests'];

        if ($interests != "") {
            echo "TITIT";
            exit();
            $interests = explode(',', $interests);


            if (is_array($interests) && count($interests)) {

                $idArray = User_interest::all()->whereIn('interest_id', $interests)->pluck('user_id');


                foreach ($idArray as $key => $val) {
                    $arr[] = $val;
                }

                if (isset($arr)) {
                    $idArray = $arr;
                    $result = User::all()->where('age', '>=', $minAge)
                        ->where('age', '<', $maxAge)
                        ->where('gender', 'like', $gender)
                        ->whereIn('id', $idArray)
                        ->sortBy('age');
                } else {
                    $result = [];
                }


            }
        }
        else{
            $result = User::all()->where('age', '>=', $minAge)
                ->where('age', '<', $maxAge)
                ->where('gender', 'like', $gender)
                ->sortBy('age');

        }


        // Перед возвратом отсеять по расстоянию

        $info['latitude'] = Auth::user()->latitude;
        $info['longitude'] = Auth::user()->longitude;

        $friend = [];
        $i = 0;
        echo count($result);
        foreach ($result as $user) {
            $i++;
            $dist = round(WelcomeController::getDistance($info['latitude'], $info['longitude'], $user->latitude, $user->longitude) / 1000, 1);
            echo $dist . '***';
            if ($dist <= $maxDist){
                $friend[] = $user;
            }
        }
        return $friend;
    }

    public static function sortByInterests(Request $request){
        $minAge = $request['min_age'];
        $maxAge = $request['max_age'];
        $gender = $request['gender'];
        $interests = $request['interests'];
        $maxDistacne = $request['max_distance'];
    }

    public static function sortByRate(Request $request){
        $minAge = $request['min_age'];
        $maxAge = $request['max_age'];
        $gender = $request['gender'];
        $interests = $request['interests'];
        $maxDistacne = $request['max_distance'];
    }

}
