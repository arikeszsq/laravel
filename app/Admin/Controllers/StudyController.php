<?php

namespace App\Admin\Controllers;

use App\Admin\Models\ZsqStudy;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StudyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '学';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ZsqStudy());

        $grid->column('id', __('Id'));
        $grid->column('type', __('类型'))->using([
            1 => '<span style="color: blue;">已完成</span>',
            2 => '<span style="color: #ff0a11;">待处理</span>',
            3 => '<span style="color: #46ff20;">处理中</span>',
        ])->sortable()->hide();
        $grid->column('name', __('名称'));
        $grid->column('description', __('描述'));
        $grid->column('content', __('内容'));
        $grid->column('create_time', __('创建时间'));

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
        $show = new Show(ZsqStudy::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('类型'));
        $show->field('name', __('名称'));
        $show->field('description', __('描述'));
        $show->field('content', __('内容'));
        $show->field('create_time', __('创建时间'));

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
        $form = new Form(new ZsqStudy());

        $form->select('type', __('类型'))->options($directors);;
        $form->text('name', __('名称'))->ckeditor;
        $form->text('description', __('描述'));
        $form->textarea('content', __('内容'));
        $form->datetime('create_time', __('创建时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
