<?php

namespace App\Admin\Controllers;

use App\Models\Message;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use Encore\Admin\Layout\Row;
use Encore\Admin\Layout\Column;
use Encore\Admin\Widgets\Box;

use App\Admin\Tools\Form1;
use Illuminate\Http\Request;
use App\Models\User;
use App\Admin\Traits\PublicTrait;
use Validator;
class InboxController extends Controller
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

    /*
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }
    */
    /**
     * Create interface.
     *
     * @return Content
     */

     /*
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }
    */

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
            $grid->disableRowSelector();
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
     /*
    protected function form()
    {
        return Admin::form(Message::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
    */

    public function show($id)
    {
      return Admin::content(function (Content $content) use ($id){
              //$content->header('内容');
              //$content->description('列表');
              $message = Message::find($id);
              if (!$message) {
                // 抛出异常
                throw new \Exception('出错啦。。。本消息不存在');
              }

              if($message->toid <= 0){
                  $message->markAsRead();
              }
              $content->row(function (Row $row) use ($message){
                $row->column(12, function (Column $column) use ($message){
                  $showForm = new Form1($message);
                  $showForm->display('fromname' ,'发件人');
                  $showForm->display('toname', '收件人');
                  $showForm->display('adminpostdate' ,'发件时间');
                  $showForm->display('title', '标题');
                  $showForm->display('content', '内容');

                  $column->append((new Box('收件内容', $showForm))->collapsable()->style('success'));
                });

                $row->column(12, function (Column $column) use ($message){
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('inbox'));
                    $form->text('toname' ,'收件人')->attribute(['readonly' => 'readonly'])->default($message->fromname);
                    $form->text('title', '标题')->default('Re: '.$message->title);
                    $form->textarea('content','内容')->attribute(['rows' => 30]);
                    $form->hidden('toid')->default($message->fromid);
                    $form->hidden('page')->default(request()->page ?: 1);
                    $column->append((new Box('快速回复', $form))->style('success'));
                });

              });

      });
    }


    public function store(Request $request)
    {

        if(!$request->toid){
            $msg = $this->success('发送对象不存在,非法操作');
            //return redirect(admin_url('inbox'))->with($msg);
            return back()->with($msg);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $user = User::find($request->toid);
        if(!$user){
          $msg = $this->error('发邮件的用户已经不存在了,可能被删除了');
          return back()->with($msg);
        }
        $data = $request->only(['toname', 'toid','title','content']);
        $page = $request->page ?: 1;
        $data = array_merge($data,['fromid'=>0,'fromname'=>'','postdate'=>time()]);
        $message = Message::create($data);

        if ($message) {
            //$message->collectImages();
            $user->markAdminemailAsNoRead();
            //User->where('uid', toid)->update(['adminemail' => 1]);
            $msg = $this->success("回复发件人 {$data['toname']} 成功");
        }else{
            $msg = $this->error("回复发件人 {$data['toname']} 失败");
        }
        $url = admin_url('inbox') . '?page='.$page;
        return redirect($url)->with($msg);

    }
}
