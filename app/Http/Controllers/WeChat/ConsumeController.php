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
        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'response' => $params
        ]);
    }
}
