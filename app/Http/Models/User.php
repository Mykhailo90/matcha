<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender',
        'country', 'city', 'latitude', 'longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    public function interests()
    {
        // return $this->belongsToMany(User_interest::class, 'user_interests', 'id', 'user_id');
        return $this->hasManyThrough('App\Http\Models\Interest', 'App\Http\Models\User_interest', 'user_id', 'user_interest_id', 'id', 'interest_id');
    }
}
