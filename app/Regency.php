<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Regency extends Model
{
   protected $table = "regencies";
   protected $primaryKey = "id";
   public $timestamps = false;
}
