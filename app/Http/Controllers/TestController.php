<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Message;
use App\Events\NewMessageAdded;

class TestController extends Controller
{
    public function getIndex(){
        $messages = Message::all();
        return view('start', compact('messages'));
    }

    public function postMessage(Request $request){
    	$messages = Message::create($request->all());
    	event(new NewMessageAdded($messages));

    	return redirect()->back();
    }

    
}
