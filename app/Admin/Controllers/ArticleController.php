<?php

namespace App\Admin\Controllers;

use App\Models\Article;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use App\Admin\Traits\PublicTrait;

class ArticleController extends Controller
{
    use ModelForm , PublicTrait;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('小说');
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
          $bookData = Article::getBasicsBook()->where('articleid', $id)->first();
          if($bookData){
            $bookData->load('relationChapters');
          }else{


          }

          $content->body(view('admin.article',compact('bookData')));
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

    public function editinfo($id)
    {
        return Admin::content(function (Content $content) use ($id){

            $content->header('编辑');
            $content->description('文章');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {

            $grid->articleid('书号')->sortable();
            $grid->articlename('小说名')->limit(30);
            $grid->author('作者')->limit(30);
            $grid->adddatetime('入库时间');
            $grid->updatetime('最后更新');
            //禁用行选择checkbox
            $grid->disableRowSelector();
            //禁用导出数据按钮
            $grid->disableExport();
            $grid->model()->orderBy('lastupdate', 'desc');
            $grid->filter(function($filter){
                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                // 在这里添加字段过滤器
                $filter->where(function ($query) {

                    $query->where('articlename', 'like', "{$this->input}%");

                }, '小说名')->placeholder('小说名');


                //$filter->equal('articlename', '小说名');
            });

            $grid->actions(function ($actions) {

                // append一个操作
                $actions->append('<a href=""><i class="fa fa-eye"></i></a>');

                // prepend一个操作
                //$actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
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
        return Admin::form(Article::class, function (Form $form) {
            //$a = config('app.fenlei');
            //dd($a);
            $form->select('sortkey','类型')->options(config('app.fenlei'));
            $form->text('articlename', '书名')->rules('required');
            $form->text('author', '作者')->rules('required');
            $form->text('adddatetime', '添加时间')->attribute(['readonly' => 'readonly']);
            $form->text('updatetime', '更新时间')->attribute(['readonly' => 'readonly']);
            $form->radio('zhuangtai','状态')->options([0 => '连载', 1 => '完本']);
            $form->textarea('intro', '简介')->attribute(['rows' => 40])->rules('required');

        });
    }
}
