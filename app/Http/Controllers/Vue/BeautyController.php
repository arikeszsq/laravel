<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use Illuminate\Support\Facades\DB;

class BeautyController extends BaseController
{
    public function list()
    {
        $type = [
            'https://img.yzcdn.cn/vant/apple-2.jpg',
            'https://img.yzcdn.cn/vant/apple-2.jpg'
        ];
        $data = [
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://img.yzcdn.cn/vant/apple-1.jpg',
                'images' => $type
            ]
        ];
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }
}
