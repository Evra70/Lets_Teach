<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kategori extends Model
{
   protected $table = "t_kategori";
   protected $primaryKey = "kategori_id";
   public $timestamps = false;
}
