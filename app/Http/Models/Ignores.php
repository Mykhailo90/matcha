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
}
