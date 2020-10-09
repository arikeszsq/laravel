<?php


namespace App\Http\Controllers\Vue;


use Illuminate\Support\Facades\DB;

class AllController extends BaseController
{
    public function add()
    {
        $params = request()->all();
        $data[] = [
            'type' => isset($params['type']) && $params['type'] ? $params['type'] : null,
            'title' => isset($params['title']) && $params['title'] ? $params['title'] : null,
            'description' => isset($params['description']) && $params['description'] ? $params['description'] : null,
            'content' => isset($params['content']) && $params['content'] ? $params['content'] : null,
            'create_time' => date('Y-m-d H:i:s', time())
        ];
        $ret = DB::table('zsq_all')->insert($data);
        if ($ret == 1) {
            return $this->returnRet($data);
        } else {
            return $this->returnRet($data, 201, 'failed');
        }
    }

    public function list()
    {
        $params = request()->all();
        $list = DB::table('zsq_all')->orderBy('id', 'desc')->get();
        $data = [];
        foreach ($list as $item) {
            $data[] = [
                'type' => $item->type,
                'title' => $item->title,
                'description' => $item->description,
                'content' => $item->content,
                'create_time' => $item->create_time
            ];
        }
        return $this->returnRet($data);
    }

}
