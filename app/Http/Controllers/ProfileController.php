<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Guest;
use App\Http\Models\Friends;
use App\Http\Models\Ignores;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile($id){
    	// Получить всю информацию по юзеру из таблицы юзеров и всю информацию из таблицы интересы юзера
    	// Передать полученную информацию в блейд шаблон

    	$fields = User::find($id);
        $who = Auth::user();
        $interests = $fields->interests;
        $time = date('Y-m-d H:i:s');
        Guest::add_guests($who->id, $fields->id, $time);
        $friend_status = Friends::get_friends_status($who->id, $fields->id);
        $ignore_status = Ignores::get_ignore_status($who->id, $fields->id);
     
        return view('final_page', [
            'fields' => $fields,
            'interests' => $interests,
            'friend_status' => $friend_status,
            'ignore_status' => $ignore_status,
            'my_id' => $who->id,
        ]);
    }

    public function add_friend(request $Request){
        $who = Auth::user();
        $user2_id = $Request['user_to'];
        Friends::add_friend($who->id, $user2_id);
        return redirect()->back();
    }

    public function del_friend(request $Request){
       $who = Auth::user();
        $user2_id = $Request['user_to'];
        Friends::del_friend($who->id, $user2_id);
        return redirect()->back();
    }

    public function del_invitation(request $Request){
        $who = Auth::user();
        $user2_id = $Request['user_to'];
        Friends::del_invitation($who->id, $user2_id);
        return redirect()->back();
    }

    public function get_invitation(request $Request){
        $who = Auth::user();
        $user2_id = $Request['user_to'];
        Friends::get_invitation($who->id, $user2_id);
        return redirect()->back();
    }

    public function add_ignore(request $Request){
        $who = Auth::user();
        $user2_id = $Request['user_to'];
        Ignores::add_ignore($who->id, $user2_id);
        return redirect()->back();
    }

    public function del_ignore(request $Request){
        $who = Auth::user();
        $user2_id = $Request['user_to'];
        Ignores::del_ignore($who->id, $user2_id);
        return redirect()->back();
    }

}
