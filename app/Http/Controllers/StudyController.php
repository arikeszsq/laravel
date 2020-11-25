<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    public function index()
    {
        $categorys = DB::table('zsq_my_plans')
            ->select('id', 'title', 'content')
            ->where('type', 1)
            ->get();
        $data = [];
        $img_url = 'http://101.133.161.125/imgs/u=312305201,2926965358&fm=173&app=25&f=JPEG.jpg';
        $imgs = DB::table('zsq_pic_type_list')
            ->where('type_id', 1)
            ->get()
            ->toArray();
        foreach ($categorys as $key => $category) {
            if(isset($imgs[$key])){
                $img_url = $imgs[$key]->url;
            }
            $data[] = [
                'id' => $category->id,
                'title' => $category->title,
                'content' => $category->content,
                'img' => $img_url
            ];
        }
        return view('study.index', ['categorys' => $data]);
    }

    public function list()
    {
        $params = request()->all();
        $category_id = $params['id'];
        $lists = DB::table('zsq_everyday_study')
            ->where('category_id', $category_id)
            ->get();

        return view('study.list', ['lists' => $lists]);
    }
}
