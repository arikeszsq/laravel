<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command_send_email_everyday_17_00';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每天下午五点发送邮件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->send();
        return 0;
    }

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
}
