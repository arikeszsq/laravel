<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZsqMoney extends Model
{
    public $table = 'zsq_money';

    public static function getMonthTotal()
    {
        $current_month = date('Y-m-01 00:00:00',time());
        $consume_money = ZsqMoney::where('create_time','>',$current_month)
            ->where('type', 1)
            ->sum('num');
        return intval($consume_money);
    }
}
