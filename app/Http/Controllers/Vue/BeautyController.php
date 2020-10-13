<?php


namespace App\Http\Controllers\Vue;


use App\Models\ZsqMoney;
use Illuminate\Support\Facades\DB;

class BeautyController extends BaseController
{
    public function list()
    {
        $type = [
            'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2658845186,3351179051&fm=26&gp=0.jpg',
            'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=3098278696,1152811325&fm=26&gp=0.jpg',
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg'
        ];
        $data = [
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2658845186,3351179051&fm=26&gp=0.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=6420b211ba37f30a9e61961f36c2ef39&imgtype=0&src=http%3A%2F%2Fbos.pgzs.com%2Frbpiczy%2FWallpaper%2F2012%2F5%2F10%2F886f35f5791f425285e4839dcb01ff06-3.jpg',
                'images' => $type
            ],
            [
                'id' => 1,
                'title' => 'test',
                'cover' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1602581799529&di=ed8065eaeb68dac22a3e10be4585b1b0&imgtype=0&src=http%3A%2F%2Fimg.article.pchome.net%2F00%2F34%2F09%2F06%2Fpic_lib%2Fs960x639%2Fjmfj061s960x639.jpg',
                'images' => $type
            ],
        ];
        return json_encode([
            'msg' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }
}
