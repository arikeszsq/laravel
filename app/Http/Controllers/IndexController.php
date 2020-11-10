<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('Index.index');
    }

    public function getData()
    {
        $data = [];
        $weights = DB::table('zsq_my_weight')->orderBy('id','desc')->get();
        foreach ($weights as $weight) {
            $data[] = ['update_date' => date('Y-m-d H', strtotime($weight->create_time)),
                'space_size' => $weight->num];
        }
        return array_reverse($data, false);
    }

    public function add()
    {
        $data = [
            'num'=>$_POST['int'],
            'create_time'=>date('Y-m-d H:i:s',time())
        ];
        DB::table('zsq_my_weight')->insert($data);
        return $this->index();
    }
}
