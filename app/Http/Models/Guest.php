<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Guest extends Model
{
   protected $table = 'guests';

   public static function add_guests($who, $to_user, $when){
   	 $id = DB::table('guests')->where('who_id', $who)
   	 						  ->where('user_to_id', $to_user)
   	 						  ->first();

    	if (!$id){
    		DB::table('guests')->insert(
      		array('who_id' => $who, 'user_to_id' => $to_user, 'created_at' => $when, 'updated_at' => $when)
      		);
    	}
    	else
    	{
    		DB::table('guests')
            ->where('who_id', $who)
   	 		->where('user_to_id', $to_user)
            ->update(array('updated_at' => $when));
		}
   }
}
