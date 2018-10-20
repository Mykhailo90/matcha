<?php

namespace App\Http\Controllers;

use App\Http\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::all();
        return $interests;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interest = Interest::create([
            'name' = $request->get('interest_name');
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show($interest)
    {
        $interest = Interest::findOrFail($interest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        $interest = Interest::findOrFail($interest);
        $interest->delete();
    }
}
