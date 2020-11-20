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
        foreach ($categorys as $category) {
            $data[] = [
                'id' => $category->id,
                'title' => $category->title,
                'content' => $category->content,
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
