<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chat extends Model
{
   protected $table = "t_chat";
   protected $primaryKey = "chat_id";
   public $timestamps = false;
}
