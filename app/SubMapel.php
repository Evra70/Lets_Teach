<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SubMapel extends Model
{
   protected $table = "t_sub_mapel";
   protected $primaryKey = "sub_mapel_id";
   public $timestamps = false;
}
