<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserLocation extends Model
{
   protected $table = "t_user_location";
   protected $primaryKey = "user_location_id";
   public $timestamps = false;
}
