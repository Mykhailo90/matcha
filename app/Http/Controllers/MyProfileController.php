<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyProfileController extends Controller
{
    public function index(){
        $fields = Auth::user();
        // dd($fields);
        return view('profile', [
            'fields' => $fields
        ]);
    }

    public function ajaxImageUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
      ]);


      if ($validator->passes()) {


        $input = $request->all();
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $user = Auth::user();
        $title = $request->title;
        $ald_avatar = explode("/", $user->$title)[1];


        if(is_file(public_path('images') . '/' . $ald_avatar))
        {
            unlink(public_path('images') . '/' . $ald_avatar);
        }
// Возможно переименовать метод из модели
        // User::create($input);

        $user->$title = 'images/' . $input['image'];
        $user->save();

        return redirect('/my_profile');
      }


      return response()->json(['error'=>$validator->errors()->all()]);
    }
}



