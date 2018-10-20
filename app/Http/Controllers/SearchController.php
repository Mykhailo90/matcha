<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchByTag(Request $request){
//        dd($request->id);
        return view('acquaintanceship', [
            'status' => $request->id,

        ]);
    }

}
