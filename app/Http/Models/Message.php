<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['author', 'content'];
}