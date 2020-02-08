<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Province extends Model
{
   protected $table = "provinces";
   protected $primaryKey = "id";
   public $timestamps = false;
}
