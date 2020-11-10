<?php


namespace App\Http\Controllers\Vue;


use Illuminate\Support\Facades\DB;

class PlanController extends BaseController
{
    public function add()
    {
        $params = request()->all();
        $type = $params['type']==true?1:0;
        $title = $params['title'];
        $content = $params['content'];
        $data = [
            'type' => $type,
            'content' => $content,
            'title' => $title,
            'created_at' => date('Y-m-d H:i:s', time())
        ];
        $ret = DB::table('zsq_my_plans')->insert($data);
        if ($ret == 1) {
            return $this->returnRet($data);
        } else {
            return $this->returnRet($data, 5001, 'fail');
        }
    }

    public function list()
    {
        $params = request()->all();
        if (isset($params['type']) && $params['type'] == 'tasks') {
            $type = 0;
        } else {
            $type = 1;
        }
        $lists = DB::table('zsq_my_plans')
            ->where('type', $type)
            ->orderBy('id', 'desc')
            ->get();
        $data = [];
        foreach ($lists as $list) {
            $data[] = [
                'id' => $list->id,
                'title' => $list->title,
                'content' => $list->content
            ];
        }
        return $this->returnRet($data);
    }

    public function delete()
    {
        $params = request()->all();
        $id = $params['id'];
        DB::table('zsq_my_plans')->where('id', $id)->delete();
        return $this->returnRet();
    }

}
