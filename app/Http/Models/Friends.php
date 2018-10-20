<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Friends extends Model
{
	const NO_FRIENDS = 0;
   	const YOU_SEND = 1;
   	const USER_SEND = 2;
   	const FRIENDS = 3;

   protected $table = 'friends';

   public static function get_friends_status($who, $to_user){
   	

   	$status = DB::table('friends')->where('user_send_id', $who)
   	 						  ->where('user_to_id', $to_user)
   	 						  ->where('status', 3)
   							->orWhere('user_send_id', $to_user)
   							->where('user_to_id', $who)
   							->where('status', 3)
   	 						  ->first();
   	 	if ($status){
   	 		return self::FRIENDS;
   	 	}

   	 $status = DB::table('friends')->where('user_send_id', $who)
   	 						  ->where('user_to_id', $to_user)
   	 						  ->where('status', 1)
   	 						   ->first();
   	 	if ($status){
   	 		return self::YOU_SEND;
   	 	}

   	$status = DB::table('friends')->where('user_send_id', $to_user)
   							->where('user_to_id', $who)
   							->where('status', 2)
   	 						  ->first();
   	 	if ($status){
   	 		return self::USER_SEND;
   	 	}
   	 	return self::NO_FRIENDS;
   }

//  public static function add_friend($who, $user2_id){
//    DB::table('friends')->insert(
//    ['user_send_id' => $who, 'user_to_id' => $user2_id, 'status' => '3']
//    );
//    Ignores::del_ignore($who, $user2_id);
//  }

    public static function send_invitation($who, $user2_id){
        DB::table('friends')->insert(
            ['user_send_id' => $who, 'user_to_id' => $user2_id, 'status' => "1"]
        );
        Ignores::del_ignore($who, $user2_id);
    }

  public static function del_invitation($who, $user2_id){
    DB::table('friends')->where('user_send_id', $who)
                        ->where('user_to_id', $user2_id)
                        ->delete();
  }

  public static function del_friend($who, $user2_id){
    DB::table('friends')->where('user_send_id', $who)
                        ->where('user_to_id', $user2_id)
                        ->orWhere('user_send_id', $user2_id)
                        ->where('user_to_id', $who)
                        ->update(['status' => 0]);
    self::del_invitation($who, $user2_id);
  }

  public static function get_invitation($who, $user2_id){
     DB::table('friends')->where('user_send_id', $user2_id)
                        ->where('user_to_id', $who)
                        ->update(['status' => 1]);
  }

}







