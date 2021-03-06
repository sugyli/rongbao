<?php

namespace App\Admin\Controllers;

use App\Models\Message;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OutboxController extends Controller
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

            $content->header('发件箱');
            $content->description('列表');

            $content->body($this->grid());
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

            $grid->messageid('ID')->sortable();
            $grid->title('标题')->limit(100);
            $grid->adminpostdate('时间');
            /*
            $grid->postdate('时间')->display(function ($postdate) {
                return formatTime($postdate);
            });
            */
            $grid->toname('收件人');
            $grid->fromname('发件人');
            $grid->isread('状态')->display(function ($isread) {
                return $isread <= 0 ? "<span style='color:blue'>对方未读</span>" : "<span style='color:red'>对方已读</span>";
            });
            //禁用创建按钮
            $grid->disableCreation();
            //禁用行选择checkbox
            $grid->disableRowSelector();
            //禁用导出数据按钮
            $grid->disableExport();
            //禁用查询过滤器
            //$grid->disableFilter();
            $grid->filter(function($filter){
              // 禁用id查询框
              $filter->disableIdFilter();
              $filter->is('toname', '收件人');
            });
            $grid->model()->where('fromid', 0);
            $grid->model()->orderBy('postdate', 'desc');
            $grid->actions(function ($actions) {
              //关闭删除按钮
               $actions->disableDelete();
               //关闭编辑按钮
               $actions->disableEdit();
               $id = $actions->getKey();
               //$row = $actions->row;
               $page = request()->page ?: 1;
               $showUrl = route('outbox.show',['id'=>$id], false) . '?page=' . $page;
               $actions->append('<a href="'. $showUrl .'"><i class="fa fa-eye"></i></a>');

            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
     public function show($id)
     {

       return Admin::content(function (Content $content) use ($id) {

           $content->header('发件');
           $content->description('内容');

           $content->body($this->form()->view($id));
       });

     }

     protected function form()
     {
         return Admin::form(Message::class, function (Form $form) {

              $form->display('toname' ,'收件人');

              $form->adminpostdate('时间');

               $form->display('isread', '状态')->with(function ($isread) {

                   return $isread > 0 ? "<span style='color:red'>对方已读</span>" : "<span style='color:blue'>对方未读</span>";
               });
               $form->display('title' ,'标题');
               $form->display('content', '内容');
               /*
               $form->display('content', '内容')->with(function ($content) {
                   $content = \Purifier::clean($content,'default');
                   return $content;
               });
               */
               //去掉提交按钮:
               $form->disableSubmit();
               //去掉重置按钮:
               $form->disableReset();

         });
     }
}
