<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use App\Models\ZsqSalary;
use Illuminate\Support\Facades\DB;

class MoneyController extends BaseController
{
    public function add()
    {
        //前端发送的是json数据，laravel用request()->all()接收$_POST接受不到
        //原生用：file_get_contents('php://input')可以接收
        $params = request()->all();
        $type = intval($params['type']);
        $num = $params['num'];
        $content = $params['content'];
        $needed = intval($params['needed']);
        $data = [
            'type' => $type,
            'num' => $num,
            'content' => $content,
            'needed' => $needed,
            'create_time' => date('Y-m-d H:i:s', time())
        ];
        $ret = DB::table('zsq_money')->insert($data);
        if ($ret == 1) {
            return $this->returnRet($data);
        } else {
            return $this->returnRet($data, 5001, 'fail');
        }
    }

    public function list()
    {
        $params = request()->all();
        $start_time = date('Y-m-01 00:00:00', time());
        if (isset($params['type']) && $params['type'] == 'salary') {
            $salary = New ZsqSalary();
            $data = $salary->getSalaryList($start_time);
        } else {
            $money = New ZsqMoney();
            $data = $money->getMoneyList($start_time);
        }

        return $this->returnRet($data);
    }

    public function delete()
    {
        $params = request()->all();
        $id = $params['id'];
        if (isset($params['type']) && $params['type'] == 'salary') {
            DB::table('zsq_salary')->where('id', $id)->delete();
        } else {
            DB::table('zsq_money')->where('id', $id)->delete();
        }
        return $this->returnRet();
    }


}
