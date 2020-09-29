<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use Illuminate\Support\Facades\DB;

class BasicInfoController extends BaseController
{
    public function info()
    {
        $current_month_01 = date('Y-m-01 00:00:00', time());
        $consume_money = ZsqMoney::getMonthTotal();
        $sip_money = DB::table('zsq_public_accumulation_funds')
            ->where('type', 1)
            ->sum('add_num');
        $center_money = DB::table('zsq_public_accumulation_funds')
            ->where('type', 2)
            ->sum('add_num');
        $total_money = DB::table('zsq_public_accumulation_funds')->sum('add_num');
        $income_true_current_month = DB::table('zsq_salary')
            ->where('get_time', '>', $current_month_01)
            ->sum('true_num');
        $income_before_current_month = DB::table('zsq_salary')
            ->where('get_time', '>', $current_month_01)
            ->sum('before_num');
        $income_other_current_month = DB::table('zsq_money')
            ->where('type', 2)
            ->where('create_time', '>', $current_month_01)
            ->sum('num');

        $last_money = $income_other_current_month + $income_true_current_month - $consume_money;


        $data = [
            ['name' => '本月总消费', 'value' => $consume_money],
            ['name' => 'prf总额', 'value' => $total_money],
            ['name' => 'prf园', 'value' => $sip_money],
            ['name' => 'prf市', 'value' => $center_money],
            ['name' => '本月税前收入', 'value' => $income_before_current_month],
            ['name' => '本月实际收入', 'value' => $income_true_current_month],
            ['name' => '本月其他收入', 'value' => $income_other_current_month],
            ['name' => '最终结算', 'value' => $last_money],
        ];
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }
}
