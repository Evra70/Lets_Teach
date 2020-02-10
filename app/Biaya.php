<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Biaya extends Model
{
   protected $table = "t_biaya";
   protected $primaryKey = "biaya_id";
   public $timestamps = false;
}
