<?php


namespace App\Http\Controllers;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * 这是带html试图的发送邮件方式
     */
    public function send()
    {
        $name = '尊敬的仲婷婷小仙女：';
        $data_online = DB::table('ztt_web')->where('online', 1)->sum('count_money');
        $data_no_online = DB::table('ztt_web')->where('online', 0)->sum('count_money');
        $data = [
            'name' => $name,
            'total_online' => $data_online,
            'total_no_online' => $data_no_online,
        ];
        Mail::send('emails.test', $data, function ($message) {
//            $to = '752601354@qq.com';
            $to = '18036161805@163.com';
            $message->to($to)->subject('数据报表');
        });
    }


    public function sendNoHtml()
    {
        $content = 'zsq';
        Mail::raw($content, function ($message) {
            $subject = '数据报表';
            $to_url = '18036161805@163.com';
            $message->subject($subject);
            $message->to($to_url);
        });
    }

}
