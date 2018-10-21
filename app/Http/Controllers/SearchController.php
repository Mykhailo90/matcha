<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Search;

class SearchController extends Controller
{
    public function searchByTag(Request $request){
//        dd($request->id);
        return view('acquaintanceship', [
            'status' => $request->id,

        ]);
    }

    public function searchByParams(Request $request){
        $sortParam = $request['sort_param'];

        switch ($sortParam) {
            case "distance":
                $data = Search::sortByDistance($request);
                break;
            case "age":
                $data = Search::sortByAge($request);
                break;
            case "interests":
                $data = Search::sortByInterests($request);
                break;
            case "fame_rating":
                $data = Search::sortByRate($request);
                break;
        }

        return $data;
    }

}
