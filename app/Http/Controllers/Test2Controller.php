<?php

namespace App\Http\Controllers;

use App\Http\Models\Search;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use App\Http\Models\User_interest;

class Test2Controller extends Controller
{
    public function index(){
        $minAge = 15;
        $maxAge = 200;
        $gender = 'male';
        $maxDist = 2000;
        $interests = '1,2,3,4,5,6,7,8,9,0,15,13,12';

        $interests = explode(',', $interests);

        if (count($interests)){

            $idArray = User_interest::all()->whereIn('interest_id', $interests)->pluck('user_id');

            foreach ($idArray as $key => $val)
                $arr[] = $val;

            $idArray = $arr;

//            dd($idArray);
            $result = User::all()->where('age', '>=', $minAge)
                ->where('age', '<', $maxAge)
                ->where('gender', 'like', $gender)
                ->whereIn('id', $idArray)
                ->sortBy('age');

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
        foreach ($result as $user) {
            $dist = WelcomeController::getDistance($info['latitude'], $info['longitude'], $user->latitude, $user->longitude);
            if ($dist <= $maxDist){
                $friend[] = $user;
            }
        }
        return $friend;
    }
}
