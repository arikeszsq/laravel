<?php


namespace App\Http\Controllers\Vue;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {

    }

    public function returnRet($data = [], $code = 200, $msg = 'success')
    {
        return json_encode([
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ]);
    }
}
