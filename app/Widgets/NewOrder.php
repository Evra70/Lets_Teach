<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class NewOrder extends AbstractWidget
{

    public $reloadTimeout =7;

    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run($navigation)
    {
        $teacher_id = $navigation;
        $teacher = DB::table('t_user')
            ->join('t_user_location', 't_user_location.user_id', '=', 't_user.user_id')
            ->join('t_policy_teacher', 't_policy_teacher.teacher_id', '=', 't_user.user_id')
            ->where('t_user.user_id', "$teacher_id")
            ->select('t_user_location.*', 't_policy_teacher.mapel_id')
            ->first();
        $pesanan = DB::select("SELECT A.*  FROM t_transaksi A
                                    INNER JOIN t_user_location B ON A.user_id = B.user_id
                                    WHERE B.province_id = '$teacher->province_id'
                                    AND B.regency_id = '$teacher->regency_id'
                                    AND B.district_id = '$teacher->district_id'
                                    AND A.status_pemesanan = 'N'
                                    AND A.mapel_id = '$teacher->mapel_id'
                                    AND A.versi = '0'
                                   ");

        return view('widgets.new_order', [
            'config' => $this->config,
            'pesananList' => $pesanan
        ]);
    }
}
