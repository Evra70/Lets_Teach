<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Transaksi extends Model
{
   protected $table = "t_transaksi";
   protected $primaryKey = "transaksi_id";
   public $timestamps = false;
}
