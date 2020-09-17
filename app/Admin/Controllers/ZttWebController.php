<?php

namespace App\Admin\Controllers;

use App\Admin\Models\ZttWeb;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ZttWebController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '网站管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ZttWeb());

        $grid->column('id', __('ID'))->color('red')->hide();
        $grid->column('title', __('名称'));
//        $grid->column('is_h5', __('是H5'));
//        $grid->column('money', __('金额'));
        $grid->column('count_money', __('计算金额'));
        $grid->column('contacter', __('联系人'));
        $grid->column('mobile', __('手机号'));
        $grid->column('ensure_picture', __('效果图'))->using([0 => '<span style="color: red;">否</span>', 1 => '是'])->sortable();
        $grid->column('program', __('程序'))->using([0 => '<span style="color: #ca66ff;">否</span>', 1 => '是'])->sortable();
        $grid->column('info', __('资料'))->using([0 => '<span style="color: #45ff35;">否</span>', 1 => '是'])->sortable();
        $grid->column('online', __('上线'))->using([0 => '<span style="color: blue;">否</span>', 1 => '是'])->sortable();
        $grid->column('domain', __('域名'));
        $grid->column('status', __('状态'))->using([
            1 => '<span style="color: blue;">已完成</span>',
            2 => '<span style="color: #ff0a11;">待处理</span>',
            3 => '<span style="color: #46ff20;">处理中</span>',
        ])->sortable()->hide();
        $grid->column('updated_at', __('更新时间'))->hide();
        $grid->column('created_at', __('添加时间'))->hide();


        $grid->footer(function ($query) {
            // 查询出已支付状态的订单总金额
            $data_online = $query->where('online', 1)->sum('count_money');
            $data_no_online = $query->where('online', 0)->sum('count_money');
            $html = "<div style='padding: 10px;color:rebeccapurple;'>上线的金额 ： $data_online ;<span style='padding: 10px;color: #0d6aad;'>未上线的总金额 ： $data_no_online</span></div>";
            return $html;
        });
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->like('title','名称')->placeholder('请输入。。。');
            $filter->column(1/2, function ($filter) {
                $filter->equal('ensure_picture','效果图')->radio([
                    1 => '是',
                    0 => '否',
                ]);
                $filter->equal('program','程序')->radio([
                    1 => '是',
                    0 => '否',
                ]);
                $filter->equal('info','资料')->radio([
                    1 => '是',
                    0 => '否',
                ]);
                $filter->equal('online','上线')->radio([
                    1 => '是',
                    0 => '否',
                ]);
            });
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ZttWeb::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('名称'));
//        $show->field('is_h5', __('是H5'));
//        $show->field('money', __('金额'));
        $show->field('count_money', __('计算金额'));
        $show->field('contacter', __('联系人'));
        $show->field('mobile', __('手机号'));
        $show->field('ensure_picture', __('确认效果图'));
        $show->field('program', __('程序'));
        $show->field('info', __('资料'));
        $show->field('online', __('上线'));
        $show->field('domain', __('域名'));
        $show->field('status', __('状态'));
        $show->field('updated_at', __('更新时间'));
        $show->field('created_at', __('添加时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $directors = [
            1 => '已完成',
            2 => '待处理',
            3 => '处理中',
        ];

        $form = new Form(new ZttWeb());

        $form->text('title', __('名称'));
//        $form->switch('is_h5', __('是H5'));
//        $form->text('money', __('金额'));
        $form->text('count_money', __('计算金额'));
        $form->text('contacter', __('联系人'));
        $form->text('mobile', __('手机号'));
        $form->switch('ensure_picture', __('确认效果图'));
        $form->switch('program', __('程序'));
        $form->switch('info', __('资料'));
        $form->switch('online', __('上线'));
        $form->text('domain', __('域名'));
        $form->select('status', '状态')->options($directors);
        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });
        return $form;
    }
}
