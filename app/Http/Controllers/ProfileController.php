<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class ProfileController extends Controller
{
    public function showProfile($id){
    	// Получить всю информацию по юзеру из таблицы юзеров и всю информацию из таблицы интересы юзера
    	// Передать полученную информацию в блейд шаблон

    	$fields = User::find($id);
        $interests = $fields->interests;
   
        
        return view('final_page', [
            'fields' => $fields,
            'interests' => $interests,
        ]);
    }
}
