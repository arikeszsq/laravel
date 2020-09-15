<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class MoneyController extends Controller
{
    public function add()
    {
        $params = $_POST;
        $type = $params['type'];
        $num = $params['num'];
        $content = $params['content'];
        $data = [
            'type' => $type,
            'num' => $num,
            'content' => $content,
            'create_time' => date('Y-m-d H:i:s', time())
        ];
        DB::table('zsq_money')->insert($data);
    }
}
