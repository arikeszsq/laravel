<?php


namespace App\Http\Controllers\WeChat;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasicInfoController extends BaseController
{
    public function info(Request $request)
    {
        $params = $request->all();
        $openid = $params['openid'];
//        $openid = 'oHkmd5fKiNJkX9EJaAbJSOnTiboQ';

        $BeginDate = date('Y-m-01 00:00:00', strtotime(date("Y-m-d")));
        $LastDate = date('Y-m-d 23:59:59', strtotime("$BeginDate +1 month -1 day"));

        $income = DB::table('min_money_earn')
            ->where('create_time', '>=', $BeginDate)
            ->where('create_time', '<=', $LastDate)
            ->where('open_id', $openid)
            ->sum('num');

        $out = DB::table('min_money_consume')
            ->where('create_time', '>=', $BeginDate)
            ->where('create_time', '<=', $LastDate)
            ->where('open_id', $openid)
            ->sum('num');

        $last_money = $income - $out;

        $today = date('Y-m-d', time());
        $chunjie = '2021-02-12';
        $yuandan = '2022-01-01';
        $gap_chunjie = $this->diffBetweenTwoDays($today, $chunjie);
        $gap_yuandan = $this->diffBetweenTwoDays($today, $yuandan);

        $data = [
            ['name' => '本月消费', 'value' => $out],
            ['name' => '本月收入', 'value' => $income],
            ['name' => '本月结算', 'value' => $last_money],
            ['name' => '距2022元旦剩余', 'value' => intval($gap_yuandan)],
            ['name' => '距2021春节剩余', 'value' => intval($gap_chunjie)],
        ];

        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'response' => $data
        ]);
    }


    function diffBetweenTwoDays($day1, $day2)
    {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);
        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }
}
