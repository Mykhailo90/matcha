<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Ignores extends Model
{
   protected $table = 'ignores';

   const NO_IGNORE = 0;
   const IGNORE_BOTH = 1;
   const IGNORE_MY = 2;
   const IGNORE_USER = 3;

public static function get_ignore_status($who, $to_user){
   	
	// dd($who . '+' . $to_user);

   	$status = DB::table('ignores')->where('user_send_id', $who)
   	 						  ->where('user_to_id', $to_user)
   							->orWhere('user_send_id', $to_user)
   							->where('user_to_id', $who)->count();
   							
   	 	if ($status == 2){
   	 		return self::IGNORE_BOTH;
   	 	}

   	 $status = DB::table('ignores')->where('user_send_id', $who)
   	 						  ->where('user_to_id', $to_user)
   	 						   ->first();
   	 	if ($status){
   	 		return self::IGNORE_MY;
   	 	}

   	$status = DB::table('ignores')->where('user_send_id', $to_user)
   							->where('user_to_id', $who)
   	 						  ->first();
   	 	if ($status){
   	 		return self::IGNORE_USER;
   	 	}
   	 	return self::NO_IGNORE;
   }

   public static function add_ignore($who, $user2_id){
   
    DB::table('ignores')->insert(
    ['user_send_id' => $who, 'user_to_id' => $user2_id]
    );

    Friends::del_friend($who, $user2_id);
  }

  public static function del_ignore($who, $user2_id){
   
    DB::table('ignores')->where('user_send_id', $who)
                        ->where('user_to_id', $user2_id)
                        ->delete();
  }

  










}
