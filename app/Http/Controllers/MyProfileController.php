<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Interest;
use App\Http\Models\User_interest;

class MyProfileController extends Controller
{
    public function index(){
        $fields = Auth::user();
        $interests = $fields->interests;
   
        
        return view('profile', [
            'fields' => $fields,
            'interests' => $interests,
            // 'all_interests' => $arg,
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

        $user->$title = 'images/' . $input['image'];
        $user->save();

        return redirect('/my_profile');
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function ajaxLoadInterests()
    {
             $all_interests = Interest::all();
        $arg = [];
        foreach ($all_interests as $key => $value) {
            $arg[] = $value->interst_name;
        }

        return $arg;
    }


    public function ajaxImageDeletePost(Request $request)
    {
        $user = Auth::user();
        $title = $request->title;
        $ald_avatar = explode("/", $user->$title)[1];

        if(is_file(public_path('images') . '/' . $ald_avatar))
        {
            unlink(public_path('images') . '/' . $ald_avatar);
        }

        $user->$title = '/img/incognito.png';
        $user->save();
        return redirect('/my_profile');
     
    }

    public function ajaxUpdateInfoPost(Request $request)
    {
        $user = Auth::user();
        // dd($request);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->sexpreferences = $request->pref;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->save();
        return redirect('/my_profile');    
    }

    public function delInterest(Request $request){
        if ($request->id){
            $user = Auth::user();
            User_interest::del_user_interest($user->id, $request->id);
            return redirect('/my_profile');   
        }
    }

    public function addInterest(Request $request){
        if ($request->add_interest){
            $user = Auth::user();
            $interest_id = Interest::get_interest_id($request->add_interest);
            User_interest::add_user_interest($user->id, $interest_id);
            return redirect('/my_profile');   
        }
    }
}



