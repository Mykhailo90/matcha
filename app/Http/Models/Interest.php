<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Interest extends Model
{
    protected $table = 'interests';
    
    public static function get_interest_id($interest_name){

    	$id = DB::table('interests')->where('interst_name', $interest_name)->first();

    	if (!$id){
    		$id = DB::table('interests')->insertGetId(array('interst_name' => $interest_name));
    	}
    	else
    	{
    		$id = $id->user_interest_id;
		}

    	return $id;
    }
}
