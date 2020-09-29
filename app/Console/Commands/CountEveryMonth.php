<?php

namespace App\Console\Commands;

use App\Models\ZsqMoney;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountEveryMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_every_month_last';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每个月末进行数据统计';

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
        $current_month_01 = date('Y-m-01 00:00:00', time());
        $consume_money = ZsqMoney::getMonthTotal();
        $income_true_current_month = DB::table('zsq_salary')
            ->where('get_time', '>', $current_month_01)
            ->sum('true_num');
        $income_before_current_month = DB::table('zsq_salary')
            ->where('get_time', '>', $current_month_01)
            ->sum('before_num');
        $income_other_current_month = DB::table('zsq_money')
            ->where('type', 2)
            ->where('create_time', '>', $current_month_01)
            ->sum('num');
        $last_money = $income_other_current_month + $income_true_current_month - $consume_money;

        DB::table('zsq_monthly_count')->insert([
            'before' => $income_before_current_month,
            'true' => $income_true_current_month,
            'other' => $income_other_current_month,
            'consume' => $consume_money,
            'last' => $last_money,
            'create_time' => date('Y-m-d H:i:s', time()),
        ]);
    }
}
