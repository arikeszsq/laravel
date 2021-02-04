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
        $params = $request->all();
        $openid = isset($params['openid']) && $params['openid'] ? $params['openid'] : null;
        $notices = DB::table('mini_notice')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
//        $lists = DB::table('mini_list')
//            ->where('recommand', 1)
//            ->where('status', 1)
//            ->orderBy('id', 'desc')
//            ->get();
//
//        if ($openid) {
//            $reminds = DB::table('mini_remind')
//                ->where('appid', $openid)
//                ->where('status', 1)
//                ->orderBy('id', 'desc')
//                ->get();
//        } else {
//            $reminds = '';
//        }
//
//        $remind_img = 'https://zhusq.top/banner/1.jpg';

//        $response = [
//            'body_bg'=>'',
//            'icon'=>'',
//            'imgUrls'=>'',
//            'logo'=>'',
//            ''=>'',
//            ''=>'',
//            ''=>'',
//            'body_bg': response.body_bg,
//          icon: response.icon,
//          imgUrls: response.banners,
//          logo: response.logo,
//          remind_img: response.remind_img,
//          lists: response.lists,
//          fashion_left: response.fashion_left,
//          fashion_right: response.fashion_right,
//          fashion_banner: response.fashion_banner,
//
//            'notices' => $notices,
//            'lists' => $lists,
//            'reminds' => $reminds,
//            'remind_img' => $remind_img,
//        ];

        $params = $request->all();
        $openid = isset($params['openid']) && $params['openid'] ? $params['openid'] : null;
        $notices = DB::table('mini_notice')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
        $lists = DB::table('mini_list')
            ->where('recommand', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $banners = DB::table('mini_banners')
            ->orderBy('id', 'desc')
            ->get();
        $response = [
            'notices' => $notices,
            'body_bg' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2516670539,581273479&fm=26&gp=0.jpg',
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

    public function basicInfo()
    {
    }

    public function saveUser(Request $request)
    {
        $params = $request->all();
        $nick_name = $params['user_info']['nickName'];
        $gender = $params['user_info']['gender'];
        $language = $params['user_info']['language'];
        $city = $params['user_info']['city'];
        $province = $params['user_info']['province'];
        $country = $params['user_info']['country'];
        $avatar_url = $params['user_info']['avatarUrl'];
        $code = $params['code'];
        $appId = 'wx9960e9d00838b0cf';
        $secret = 'c2a527575ce13f5aacb46dab6fca8145';
        $get_code_url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appId . '&secret=' . $secret . '&js_code=' . $code . '&grant_type=authorization_code';
        $ret = file_get_contents($get_code_url);
        $openid = json_decode($ret, true)['openid'];
        $user_model = new MiniUser();
        $user = $user_model->getUserByOpenid($openid);
        if (!$user) {
            $user_model->setAttribute('openid', $openid);
            $user_model->setAttribute('nick_name', $nick_name);
            $user_model->setAttribute('gender', $gender);
            $user_model->setAttribute('language', $language);
            $user_model->setAttribute('city', $city);
            $user_model->setAttribute('province', $province);
            $user_model->setAttribute('country', $country);
            $user_model->setAttribute('avatar_url', $avatar_url);
            $ret = $user_model->save();
            if ($ret) {
                return json_encode([
                    'code' => 200,
                    'msg' => 'success',
                    'response' => $user_model
                ]);
            } else {
                return json_encode([
                    'code' => 501,
                    'msg' => '新建用户失败',
                ]);
            }
        } else {
            $user_nick_name = $user->getAttribute('nick_name');
            $user_avatar_url = $user->getAttribute('avatar_url');
            if ($user_nick_name != $nick_name) {
                $user_model->setAttribute('nick_name', $nick_name);
                $ret = $user_model->save();
                if ($ret) {
                    return json_encode([
                        'code' => 200,
                        'msg' => 'success',
                        'response' => $user_model
                    ]);
                } else {
                    return json_encode([
                        'code' => 502,
                        'msg' => '更新用户昵称失败',
                    ]);
                }
            }
            if ($avatar_url != $user_avatar_url) {
                $user_model->setAttribute('avatar_url', $avatar_url);
                $ret = $user_model->save();
                if ($ret) {
                    return json_encode([
                        'code' => 200,
                        'msg' => 'success',
                        'response' => $user_model
                    ]);
                } else {
                    return json_encode([
                        'code' => 503,
                        'msg' => '更新用户头像失败',
                    ]);
                }
            }
            return json_encode([
                'code' => 200,
                'msg' => 'success',
                'response' => $user
            ]);
        }
    }

}
