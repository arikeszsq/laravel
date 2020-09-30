<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use App\Models\ZsqSalary;
use Illuminate\Support\Facades\DB;

class SalaryController extends BaseController
{
    public function add()
    {
        $params = request()->all();
        $before_num = $params['before_num'];
        $after_num = $params['after_num'];
        $content = $params['content'];
        $get_date = $params['get_date'];
        if (isset($params['add_type']) && $params['add_type']) {
            $add_type = $params['add_type'];
            if ($add_type == 'Salary') {
                $data = [
                    'name' => 1,
                    'backup' => $content,
                    'before_num' => $before_num,
                    'true_num' => $after_num,
                    'get_time' => date('Y-m-d H:i:s', $get_date / 1000),
                    'create_time' => date('Y-m-d H:i:s', time())
                ];
                $ret = DB::table('zsq_salary')->insert($data);
                if ($ret == 1) {
                    return $this->returnRet($data);
                }
            } elseif ($add_type == 'Other') {
                $data = [
                    'type' => 2,
                    'num' => $before_num,
                    'content' => $content,
                    'create_time' => date('Y-m-d H:i:s', time())
                ];
                $ret = DB::table('zsq_money')->insert($data);
                if ($ret == 1) {
                    return $this->returnRet($data);
                }
            }

        }
        return $this->returnRet($params, 5001, 'fail');
    }

    public function delete()
    {
        $params = request()->all();
        $id = $params['id'];
        DB::table('zsq_salary')->where('id', $id)->delete();
        return $this->returnRet();
    }


}
