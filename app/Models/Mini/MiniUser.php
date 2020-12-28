<?php


namespace App\Models\Mini;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MiniUser extends Model
{
    public $table = 'mini_user';

    public function getUserByOpenid($openId)
    {
        $user = MiniUser::query()
            ->where('openid', $openId)
            ->first();
        return $user;
    }
}
