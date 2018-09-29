<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;

class MyProfileController extends Controller
{
    public function index(){
        $fields = Auth::user();
        // dd($fields);
        return view('profile', [
            'fields' => $fields
        ]);
    }

    public function imageUpdate(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $fileName = $request->file('image')->getClientOriginalName();
            $user = Auth::user();
            $ald_avatar = explode("/", $user->avatar)[3];


            if(is_file('app/public/images/'.$ald_avatar))
            {
                unlink(storage_path('app/public/images/'.$ald_avatar));
            }

            $fileName = $user->id . '_' . $fileName;
            
            $path = $request->file('image')->storeAs('public/images', $fileName);
            $path = '/storage/images/' . $fileName;
            
            $user->avatar = $path;
            $user->save();
            return "ok";
        }
       
    }

    public function updateProfile(Authenticatable $user)
    {
      // $user  - это экземпляр аутентифицированного пользователя...
      if (Auth::check())
      {
        // Пользователь вошёл в систему...
      }
    }
}
