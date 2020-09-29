<?php


namespace App\Http\Controllers\Vue;


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

    public function list()
    {
        $params = $_POST;
        $start_time = date('Y-m-01 00:00:00',time());
        $lists = DB::table('zsq_money')
            ->where('create_time','>',$start_time)
            ->orderBy('id','desc')
            ->get();
        $data = [];
        foreach ($lists as $list) {
            $data[] = [
                'id'=>$list->id,
                'type' => $list->type,
                'num' => $list->num,
                'content' => $list->content,
                'needed' => $list->needed,
                'time' => date('m-d H:s', strtotime($list->create_time)),
            ];
        }
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }

    public function delete()
    {
        var_dump($_POST);exit;
        return json_encode([
            'msg' => 'success',
            'code' => 200,
        ]);
    }

}
