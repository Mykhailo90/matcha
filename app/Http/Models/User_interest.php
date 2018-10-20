<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User_interest extends Model
{
   protected $table = 'user_interests';

   public function users()
   {
    return $this->belongsToMany(User::class, 'user_interests', 'user_id', 'id');
   }

   public static function del_user_interest($user_id, $interest_id){
   		DB::table('user_interests')->where('user_id', '=', $user_id)
   			->where('interest_id', '=', $interest_id)
   			->delete();
   }

   public static function add_user_interest($user_id, $interest_id){
      DB::table('user_interests')->insert(
      array('user_id' => $user_id, 'interest_id' => $interest_id)
      );
   }
}
