<?php

namespace App\Admin\Controllers;

use App\Models\Message;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class InboxController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('收件箱');
            $content->description('列表');


            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Message::class, function (Grid $grid) {

            //$grid->id('ID')->sortable();
            $grid->fromname('发件人');
            $grid->title('标题')->limit(150);
            $grid->adminpostdate('时间');
            $grid->toname('收件人');
            $grid->isread('状态')->display(function ($isread) {
                return $isread <= 0 ? "<span style='color:blue'>未读</span>" : "<span style='color:red'>已读</span>";
            });
            //禁用创建按钮
            $grid->disableCreation();
            //禁用行选择checkbox
            //$grid->disableRowSelector();
            //禁用导出数据按钮
            $grid->disableExport();
            //禁用查询过滤器
            $grid->disableFilter();

            $grid->model()->where('fromid', '!=', 0);
            $grid->model()->orderBy('postdate', 'desc');

            $grid->actions(function ($actions) {
              //关闭删除按钮
               $actions->disableDelete();
               //关闭编辑按钮
               $actions->disableEdit();
               $id = $actions->getKey();
               //$row = $actions->row;

               $page = request()->page ?: 1;

               $showUrl = route('inbox.show',['id'=>$id]) . '?page=' . $page;
               $actions->append('<a href="'. $showUrl .'"><i class="fa fa-eye"></i></a>');

            });




        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Message::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
