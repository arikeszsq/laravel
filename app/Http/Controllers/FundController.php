<?php


namespace App\Http\Controllers;


use App\Models\ZsqMoney;
use Illuminate\Support\Facades\DB;

class FundController extends Controller
{
    public function getInfo()
    {
        $sip_money = DB::table('zsq_public_accumulation_funds')
            ->where('type', 1)
            ->sum('add_num');
        $center_money = DB::table('zsq_public_accumulation_funds')
            ->where('type', 2)
            ->sum('add_num');
        $total_money = DB::table('zsq_public_accumulation_funds')->sum('add_num');

        $consume_money = ZsqMoney::getMonthTotal();

        $data = [
            'total_money' => $total_money,
            'center_money' => $center_money,
            'sip_money' => $sip_money,
            'consume_money'=>$consume_money
        ];
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }
}
