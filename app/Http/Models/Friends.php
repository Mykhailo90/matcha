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
   	 						  ->where('status', 1)
   							->orWhere('user_send_id', $to_user)
   							->where('user_to_id', $who)
   							->where('status', 1)
   	 						  ->first();
   	 	if ($status){
   	 		return self::FRIENDS;
   	 	}

   	 $status = DB::table('friends')->where('user_send_id', $who)
   	 						  ->where('user_to_id', $to_user)
   	 						  ->where('status', 0)
   	 						   ->first();
   	 	if ($status){
   	 		return self::YOU_SEND;
   	 	}

   	$status = DB::table('friends')->where('user_send_id', $to_user)
   							->where('user_to_id', $who)
   							->where('status', 0)
   	 						  ->first();
   	 	if ($status){
   	 		return self::USER_SEND;
   	 	}
   	 	return self::NO_FRIENDS;
   }

  //  public static function add_friends($who, $to_user){
  //  	// При добавлении алгоритм
  //  	// 1 Проверить вы друзья ?
  //  	// 2 проверить нет ли уже отправленной заявки в друзья Вам (принять заявку!) кнопка подтвердить
  //  	// 3 проверить нет ли уже отправленной заявки в друзья Вами (отменить заявку!) кнопка подтвердить
  //  	// Если нет создать нужную запись в БД
  //  	 $id = DB::table($this->table)->where('who_id', $who)
  //  	 						  ->where('user_to_id', $to_user)
  //  	 						  ->first();

  //   	if (!$id){
  //   		DB::table('guests')->insert(
  //     		array('who_id' => $who, 'user_to_id' => $to_user, 'created_at' => $when, 'updated_at' => $when)
  //     		);
  //   	}
  //   	else
  //   	{
  //   		DB::table('guests')
  //           ->where('who_id', $who)
  //  	 		->where('user_to_id', $to_user)
  //           ->update(array('updated_at' => $when));
		// }
  //  }
}
