<?php


namespace App\Models\Mini;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MiniUser extends Model
{
    public $table = 'mini_user_info';

    public function getUserByOpenid($openId)
    {
        $user = MiniUser::query()
            ->where('open_id', $openId)
            ->first();
        return $user;
    }
}
