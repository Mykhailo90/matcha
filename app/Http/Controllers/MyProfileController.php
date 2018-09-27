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
        $path = $request->file('image')->store('image');
        dd($path);
            return $path;
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
