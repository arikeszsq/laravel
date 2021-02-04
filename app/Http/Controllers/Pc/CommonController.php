<?php

namespace App\Http\Controllers\Pc;

use Illuminate\Support\Facades\DB;

class CommonController extends BaseController
{
    public function list()
    {
        $params = request()->all();
        $list_type = isset($params['list_type']) && $params['list_type'] ? $params['list_type'] : '';
        if ($list_type) {
            $lists = DB::table('zsq_my_plans')
                ->orderBy('id', 'desc')
                ->where('type', $list_type)
                ->where('enable', 1)
                ->paginate(10);
        } else {
            $lists = DB::table('zsq_my_plans')
                ->orderBy('id', 'desc')
                ->where('enable', 1)
                ->paginate(10);
        }
        return view('pc.common.list', ['lists' => $lists]);
    }

    public function detail()
    {
        $params = request()->all();
        $detail = DB::table('zsq_my_plans')->where('id', $params['id'])->first();
        return view('pc.common.detail', ['detail' => $detail]);
    }
}
