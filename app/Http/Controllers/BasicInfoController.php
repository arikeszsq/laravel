<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class BasicInfoController extends Controller
{
    public function info()
    {
        $today = date('Y-m-d',time());
        $chunjie = '2021-02-12';
        $yuandan = '2021-01-01';
        $gap_chunjie = $this->diffBetweenTwoDays($today,$chunjie);
        $gap_yuandan = $this->diffBetweenTwoDays($today,$yuandan);

        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'gap_chunjie'=>$gap_chunjie,
            'gap_yuandan'=>$gap_yuandan
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
