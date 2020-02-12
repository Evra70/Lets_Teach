<?php

namespace App\Widgets;

use App\Chat;
use App\Transaksi;
use App\User;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;

class ChatBox extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    public $reloadTimeout = 2;
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run($id,$user_id)
    {
            $transaksi=Transaksi::find($id);
            $teacher=User::find($transaksi->teacher_id);
            $user=User::find($transaksi->user_id);
            $chatList = DB::select("SELECT A.* FROM t_chat A
                                           WHERE (A.send_id = '$transaksi->user_id' 
                                           AND A.get_id = '$transaksi->teacher_id')
                                           OR (A.send_id = '$transaksi->teacher_id'
                                           AND A.get_id = '$transaksi->user_id')
                                           ORDER BY A.chat_id" );

        return view('widgets.chat_box', [
            'config' => $this->config,
            'chatList' => $chatList,
            'user_id' => $user_id,
            'user' => $user,
            'teacher' => $teacher,
        ]);
    }
}
