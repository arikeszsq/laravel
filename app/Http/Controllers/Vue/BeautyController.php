<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use Illuminate\Support\Facades\DB;

class BeautyController extends BaseController
{
    public function list()
    {
        $lists = DB::table('zsq_pic_type')->get();
        $data = [];
        foreach ($lists as $list) {
            $type_lists = DB::table('zsq_pic_type_list')
                ->where('type_id', $list->type)
                ->get();
            $type = [];
            foreach ($type_lists as $img) {
                $type[] = $img->url;
            }
            $data[] = [
                'id' => $list->id,
                'title' => $list->title,
                'cover' => $list->cover,
                'images' => $type
            ];
        }
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }
}
