<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class VueController extends Controller
{
    public function addMoney()
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

    public function listMoney()
    {
        $list = DB::table('zsq_money')
            ->orderBy('id', 'desc')
            ->get();
        $data = [];
        foreach ($list as $info) {
            $content = date('m-d H:i', strtotime($info->create_time)) . '      ' . $info->content
                . ' : ' . $info->num;
            $data[] = [
                'id' => $info->id,
                'content' => $content
            ];
        }
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'list' => $data
        ]);
    }
}
