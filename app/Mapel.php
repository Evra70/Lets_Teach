<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mapel extends Authenticatable
{
   protected $table = "t_mapel";
   protected $primaryKey = "mapel_id";
//   public $timestamps = true;
}
