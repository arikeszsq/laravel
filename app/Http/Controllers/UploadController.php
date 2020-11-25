<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index(){
        return view('upload.index');
    }
    public function upload()
    {
        $path = base_path();//根目录
        $type = $_POST['type'] ?? 1;
        $title = $_POST['title'] ?? '默认';
        $cover_url = $path . "/public/imgs/" . $_FILES["cover"]["name"];

        move_uploaded_file($_FILES["cover"]["tmp_name"], $cover_url);
        $data = [
            'title' => $title,
            'type' => $type,
            'cover' => 'http://101.133.161.125' . "/imgs/" . $_FILES["cover"]["name"],
            'create_time' => date('Y-m-d H:i:s', time())
        ];
        DB::table('zsq_pic_type')->insert($data);

        foreach ($_FILES["uploads"]['tmp_name'] as $key => $value) {
            $tmp_name = $_FILES["uploads"]["tmp_name"][$key];
            $list_url = $path . "/public/imgs/" . $_FILES["uploads"]["name"][$key];
            move_uploaded_file($tmp_name, $list_url);
            $data = [
                'type_id' => $type,
                'url' => 'http://101.133.161.125' . "/imgs/" . $_FILES["uploads"]["name"][$key],
            ];
            DB::table('zsq_pic_type_list')->insert($data);
        }
        return 'success';
    }

}
