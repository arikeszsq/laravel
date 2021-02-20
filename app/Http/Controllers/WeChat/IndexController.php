<?php


namespace App\Http\Controllers\WeChat;


use App\Models\Mini\MiniUser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
    public function getInfo(Request $request)
    {
        $lists = DB::table('mini_list')
            ->where('type', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $index_recommand_news = DB::table('mini_list')
            ->where('recommand', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $banners = DB::table('mini_banner')
            ->orderBy('id', 'desc')
            ->get();
        $response = [
            'notices' => $index_recommand_news,
            'body_bg' => 'https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=1180582567,3748818581&fm=26&gp=0.jpg',
            'icon' => 'https://sucai.suoluomei.cn/sucai_zs/images/20200509144507-broadcast%402x.png',
            'logo' => 'https://gss0.baidu.com/70cFfyinKgQFm2e88IuM_a/forum/w=580/sign=4b62c335ec24b899de3c79305e061d59/74ceab4bd11373f0e15886aaa10f4bfbfbed0429.jpg',
            'banners' => $banners,
            'lists' => $lists,
            'fashion_left' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg',
            'fashion_right' => [
                ['title' => '吴尊', 'pic' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg'],
                ['title' => '吴尊', 'pic' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg']
            ],
            'fashion_banner' => [
                [
                    'pic1' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg',
                    'pic2' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg',
                    'pic3' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg'
                ],
                [
                    'pic1' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg',
                    'pic2' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg',
                    'pic3' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg'
                ]
            ]
        ];
        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'response' => $response
        ]);
    }

    /**
     * 首页精选列表
     * @param Request $request
     * @return false|string
     */
    public function getLists(Request $request)
    {
        $params = $request->all();
        $type = $params['type'];
        $lists = DB::table('mini_list')
            ->where('type', $type)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
        $response = [
            'lists' => $lists
        ];
        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'response' => $response
        ]);

    }

    public function getDetail(Request $request)
    {
        $params = $request->all();
        $id = $params['id'];
        $detail = DB::table('mini_list')
            ->where('id', $id)
            ->first();
        $response = [
            'detail' => $detail
        ];
        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'response' => $response
        ]);
    }

}
