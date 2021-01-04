<?php


namespace App\Http\Controllers\WeChat;


use App\Models\Mini\MiniUser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumeController extends BaseController
{
    public function add(Request $request)
    {
        $params = $request->all();
        $type = $params['type'];
        $user_id = $params['openid'];
        $backup = $params['backup'];
        $num = $params['num'];
        if ($type == 'consume') {
            $data = [
                'user_id' => $user_id,
                'num' => $num,
                'content' => $backup,
                'needed' => 1,
                'type' => 1,
                'create_time' => date('Y-m-d H:i:s')
            ];
            DB::table('zsq_money_consume')
                ->insert($data);
        } elseif ($type == 'income') {
            $data = [
                'user_id' => $user_id,
                'num' => $num,
                'content' => $backup,
                'needed' => 1,
                'type' => 1,
                'create_time' => date('Y-m-d H:i:s')
            ];
            DB::table('zsq_money_earn')
                ->insert($data);
        }

        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'response' => $data
        ]);
    }
}
