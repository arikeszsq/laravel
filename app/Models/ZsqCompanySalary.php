<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ZsqCompanySalary extends Model
{
    public $table = 'zsq_company_salary';

    public function getSalaryList($start_time)
    {
        $data = [];
        $lists = ZsqCompanySalary::query()
            ->where('get_time', '>', $start_time)
            ->orderBy('id', 'desc')
            ->get();
        $total = 0;
        foreach ($lists as $list) {
            $data[] = [
                'id' => $list->id,
                'type' => $list->name,
                'num' => $list->true_num,
                'content' => $list->backup,
                'needed' => '',
                'time' => date('m-d H:s', strtotime($list->get_time)),
            ];
            $total += $list->true_num;
        }
        $data['total'] = $total;
        return $data;
    }
}
