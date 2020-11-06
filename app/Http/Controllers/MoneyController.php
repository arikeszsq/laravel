<?php


namespace App\Http\Controllers;


use App\Models\ZsqMoneyConsume;
use Illuminate\Support\Facades\DB;

class MoneyController extends Controller
{
    public function add()
    {
        $params = $_POST;
        $type = $params['type'];
        $num = $params['num'];
        $content = $params['content'];
        $data = [
            'type' => $type,
            'num' => $num,
            'content' => $content,
            'create_time' => date('Y-m-d H:i:s', time())
        ];
        $ret = DB::table('zsq_money')->insert($data);
        if ($ret == 1) {
            return json_encode([
                'msg' => 'success',
                'code' => 200,
                'data' => $data
            ]);
        } else {
            return json_encode([
                'msg' => 'fail',
                'code' => 5001,
                'data' => $data
            ]);
        }

    }

    public function getCountMoney()
    {
        $total_money = ZsqMoneyConsume::getMonthTotal();
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'total_money' => $total_money
        ]);
    }

    public function getList()
    {
        $list = DB::table('zsq_money_consume')
            ->get();
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'list' => $list
        ]);
    }
}
