<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ZsqMoneyConsume extends Model
{
    public $table = 'zsq_money_consume';

    public static function getMonthTotal()
    {
        $current_month = date('Y-m-01 00:00:00', time());
        $consume_money = ZsqMoneyConsume::where('create_time', '>', $current_month)
            ->where('type', 1)
            ->sum('num');
        return intval($consume_money);
    }

    public function getMoneyList($start_time)
    {
        $data = [];
        $lists = ZsqMoneyConsume::query()
            ->where('create_time', '>', $start_time)
            ->orderBy('id', 'desc')
            ->get();

        $total = 0;
        foreach ($lists as $list) {
            $data[] = [
                'id' => $list->id,
                'type' => $list->type,
                'num' => $list->num,
                'content' => $list->content,
                'needed' => $list->needed,
                'time' => date('m-d H:s', strtotime($list->create_time)),
            ];
            $total += $list->num;
        }
        $data['total'] = $total.' : '.($total-5200);
        return $data;
    }
}
