<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Riwayat extends Model
{
   protected $table = "t_riwayat_transaksi";
   protected $primaryKey = "riwayat_id";
   public $timestamps = false;
}
