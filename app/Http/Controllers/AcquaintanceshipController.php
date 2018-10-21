<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Interest;
use Illuminate\Support\Facades\Input;

class AcquaintanceshipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsersByDistance = User::orderByRaw('age ASC')->paginate(4);
        $allInterests = Interest::all();

        if (Input::has('page')){
            $page = Input::get('page');
        } else {
            $page = 1;
        }

//            dd($allUsersByDistance);
        return view('acquaintanceship', [
            'allInterests' => $allInterests,
            'allUsersByDistance' => $allUsersByDistance,
            'page' => $page,
        ]);
    }

    public function listPartial(){
        $allUsersByDistance = User::orderByRaw('age ASC')->paginate(4);
        return view('page_details', compact(['allUsersByDistance']));
    }
}
