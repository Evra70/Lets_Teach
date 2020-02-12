<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class District extends Model
{
   protected $table = "districts";
   protected $primaryKey = "id";
   public $timestamps = false;
}
