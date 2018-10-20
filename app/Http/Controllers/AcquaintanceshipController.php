<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Interest;

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
        $allUsersByDistance = User::orderByRaw('age ASC')->paginate(9);
        $allInterests = Interest::all();


//            dd($allUsersByDistance);
        return view('acquaintanceship', [
            'allInterests' => $allInterests,
            'allUsersByDistance' => $allUsersByDistance,
        ]);
    }
}
