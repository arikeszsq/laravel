<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function weight()
    {
        return view('charts.weight');
    }

    public function getData()
    {
        $data = [];
        $weights = DB::table('zsq_my_weight')->orderBy('id', 'desc')->get();
        foreach ($weights as $weight) {
            $data[] = ['update_date' => date('Y-m-d H', strtotime($weight->create_time)),
                'space_size' => $weight->num];
        }
        return array_reverse($data, false);
    }

    public function add()
    {
        $data = [
            'num' => $_POST['int'],
            'create_time' => date('Y-m-d H:i:s', time())
        ];
        $ret = DB::table('zsq_my_weight')->insert($data);
        if ($ret == 1) {
            $code = 200;
            $msg = '添加数据成功';
        } else {
            $code = 201;
            $msg = '失败';
        }
        $ret = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return json_encode($ret);
    }
}
