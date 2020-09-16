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
        $grid->column('ensure_picture', __('确认效果图'));

        $grid->column('program', __('程序'));
        $grid->column('info', __('资料'));
        $grid->column('online', __('上线'));

        $grid->column('domain', __('域名'));
        $grid->column('status', __('状态'));
        $grid->column('updated_at', __('更新时间'))->hide();
        $grid->column('created_at', __('添加时间'))->hide();

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
