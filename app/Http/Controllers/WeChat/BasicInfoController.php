<?php


namespace App\Http\Controllers\WeChat;


use App\Models\ZsqMoneyConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasicInfoController extends BaseController
{
    public function info(Request $request)
    {
        $params = $request->all();
//        $openid = $params['openid'];
        $openid ='';
        $year_01_01 = date('Y-01-01 00:00:00', time());
        $current_month_01 = date('Y-m-01 00:00:00', time());

        $consume_money = ZsqMoneyConsume::getMonthTotal();

        $sip_money = DB::table('zsq_company_prf')
            ->where('type', 1)
            ->sum('add_num');

        $center_money = DB::table('zsq_company_prf')
            ->where('type', 2)
            ->sum('add_num');

        $total_money = DB::table('zsq_company_prf')->sum('add_num');

        $income_true_current_month = DB::table('zsq_company_salary')
            ->where('get_time', '>', $current_month_01)
            ->sum('true_num');

        $income_before_current_month = DB::table('zsq_company_salary')
            ->where('get_time', '>', $current_month_01)
            ->sum('before_num');

        $income_other_current_month = DB::table('zsq_money_earn')
            ->where('create_time', '>', $current_month_01)
            ->sum('num');

        $last_money = $income_other_current_month + $income_true_current_month - $consume_money;


        $salary_money = DB::table('zsq_company_salary')
            ->where('get_time', '>=', $year_01_01)
            ->sum('true_num');
        $salary_before_money = DB::table('zsq_company_salary')
            ->where('get_time', '>=', $year_01_01)
            ->sum('before_num');

        $today = date('Y-m-d', time());
        $chunjie = '2021-02-12';
        $yuandan = '2022-01-01';
        $gap_chunjie = $this->diffBetweenTwoDays($today, $chunjie);
        $gap_yuandan = $this->diffBetweenTwoDays($today, $yuandan);


        if($openid=='oHkmd5fKiNJkX9EJaAbJSOnTiboQ'){
            $data = [
                ['name' => '距离2022元旦', 'value' => intval($gap_yuandan)],
                ['name' => '距离2021-02-12春节', 'value' => intval($gap_chunjie)],
                ['name' => '本月最终结算', 'value' => intval($last_money)],
                ['name' => '本月房贷外消费', 'value' => $consume_money - 5200],
                ['name' => '本月总消费', 'value' => $consume_money],
                ['name' => '本月税前收入', 'value' => $income_before_current_month],
                ['name' => '本月税后收入', 'value' => $income_true_current_month],
                ['name' => '本月其他收入', 'value' => $income_other_current_month],
                ['name' => 'prf总额', 'value' => $total_money],
                ['name' => 'prf园', 'value' => $sip_money],
                ['name' => 'prf市', 'value' => $center_money],
                ['name' => '今年工资税后共计', 'value' => intval($salary_money)],
                ['name' => '今年工资税前共计', 'value' => intval($salary_before_money)],
            ];
        }else{
            $data = [
                ['name' => '距离2022元旦', 'value' => intval($gap_yuandan)],
                ['name' => '距离2021-02-12春节', 'value' => intval($gap_chunjie)],
                ['name' => '本月最终结算', 'value' => intval($last_money)],
                ['name' => '本月总消费', 'value' => $consume_money],
                ['name' => '本月总收入', 'value' => $consume_money],
            ];
        }
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
