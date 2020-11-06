<?php


namespace App\Http\Controllers\Vue;


use Illuminate\Support\Facades\DB;

class LearnController extends BaseController
{
    public function list()
    {
        $params = request()->all();
        $type = isset($params['type']) && $params['type'] ? $params['type'] : '';
        $data = [];
//        if ($type) {
        $list = DB::table('zsq_everyday_shici')->orderBy('id','desc')->get();
        foreach ($list as $item) {
            $data[] = [
                'title' => $item->title,
                'author' => $item->author,
                'description' => $item->description,
                'content' => $item->content,
                'create_time' => $item->create_time
            ];
        }
//        }
        return $this->returnRet($data);
    }

}
