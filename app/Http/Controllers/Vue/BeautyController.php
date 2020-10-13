<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use Illuminate\Support\Facades\DB;

class BeautyController extends BaseController
{
    public function list()
    {
        $type = [
            'http://101.133.161.125/imgs/123.png',
            'http://101.133.161.125/imgs/123.png'
        ];
        $data = [
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'http://101.133.161.125/imgs/123.png',
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
