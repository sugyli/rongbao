<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Traits\UsersTrait;
class MsgboxsController extends Controller
{

    use UsersTrait;
    //发件箱
    public function webdashubaooutboxindex(){

        $user = \Auth::user();
        $limit = $user->massagemaxcount;
        $user->load(['relationOutboxs' => function ($query) use ($limit){
            $query->where('fromdel','!=',1)
                  ->orderBy('postdate', 'desc')
                  ->limit($limit);
        }]);

        return view('novel.outbox' , compact('user'));

    }

    public function wapdashubaooutboxindex(Request $request){

        $user = \Auth::user();
        $limit = $user->massagemaxcount;
        $user->load(['relationOutboxs' => function ($query) use ($limit){
            $query->where('fromdel','!=',1)
                  ->orderBy('postdate', 'desc')
                  ->limit($limit);
        }]);

        return view('novel.moutbox' , compact('request','user'));

    }

    public function webdashubaoinboxindex(){

        $user = \Auth::user();
        $limit = $user->massagemaxcount;
        $user->load(['relationInboxs' => function ($query) use ($limit){
            $query->where('todel','!=',1)
                  ->orderBy('postdate', 'desc')
                  ->limit($limit);
        }]);
        $user->markAdminemailAsRead();
        return view('novel.inbox' , compact('user'));

    }

    public function wapdashubaoinboxindex(Request $request){
        $user = \Auth::user();
        $limit = $user->massagemaxcount;
        $user->load(['relationInboxs' => function ($query) use ($limit){
            $query->where('todel','!=',1)
                  ->orderBy('postdate', 'desc')
                  ->limit($limit);
        }]);
        $user->markAdminemailAsRead();
        return view('novel.minbox' , compact('request','user'));

    }


    public function webdashubaooutboxshow($id){

      $messageData = \Auth::user()->relationOutboxs()
                                  ->where('messageid', $id)
                                  ->where('fromdel','!=',1)
                                  ->first();
      $isfajian = 0;
      if ($messageData) {
          //$bkurl = request()->redirect_url ?: '/';
          return view('novel.messageshow', compact('messageData','isfajian'));
      }
      return redirect()->route('web.dashubaooutboxindex',[], false);
    }

    public function wapdashubaooutboxshow($id,Request $request){


      $messageData = \Auth::user()->relationOutboxs()
                                  ->where('messageid', $id)
                                  ->where('fromdel','!=',1)
                                  ->first();
      $isfajian = 0;
      if ($messageData) {
          //$bkurl = request()->redirect_url ?: '/';
          return view('novel.mmessageshow', compact('request','messageData','isfajian'));
      }
      return redirect()->route('wap.dashubaooutboxindex',[], false);
    }


    public function webdashubaoinboxshow($id){

        $user = \Auth::user();
        $messageData = $user->relationInboxs()
                      ->where('messageid', $id)
                      ->where('todel','!=',1)
                      ->first();
        $isfajian = 1;
        if ($messageData) {
            $messageData->markAsRead();
            $user->markAdminemailAsRead();
            //$bkurl = request()->redirect_url ?: '/';
            return view('novel.messageshow', compact('messageData','isfajian'));
        }
        return redirect()->route('web.dashubaoinboxindex',[], false);
    }

    public function wapdashubaoinboxshow($id,Request $request){

        $user = \Auth::user();
        $messageData = $user->relationInboxs()
                      ->where('messageid', $id)
                      ->where('todel','!=',1)
                      ->first();
        $isfajian = 1;
        if ($messageData) {
            $messageData->markAsRead();
            $user->markAdminemailAsRead();
            //$bkurl = request()->redirect_url ?: '/';
            return view('novel.mmessageshow', compact('request','messageData','isfajian'));
        }
        return redirect()->route('wap.dashubaoinboxindex',[], false);
    }


    public function outboxdestroy(Request $request){

      $user = $request->user();

      $result = ['error'=>0,'message'=>'未知错误','bakdata'=>[]];
      if (empty($user)) {
        $result['message'] = '还没有登录';
        return response()->json($result);
      }

      $messageids  = $request->messageids;
      if(is_array($messageids) && !empty($messageids)){
        $msg =  $user->relationOutboxs()
                    ->whereIn('messageid', $messageids)
                    ->update(['fromdel' => 1]);
        if ($msg) {
          $result['error'] = 1;
          $result['message'] = '删除成功';
          return response()->json($result);

        }

      }
      $result['message'] = '删除失败';
      return response()->json($result);

    }

    public function inboxdestroy(Request $request){

      $user = $request->user();

      $result = ['error'=>0,'message'=>'未知错误','bakdata'=>[]];
      if (empty($user)) {
        $result['message'] = '还没有登录';
        return response()->json($result);
      }
      $messageids  = $request->messageids;

      if(is_array($messageids) && !empty($messageids)){
        $msg =  $user->relationInboxs()
                    ->whereIn('messageid', $messageids)
                    ->update(['todel' => 1]);

        if ($msg) {
          $result['error'] = 1;
          $result['message'] = '删除成功';
          return response()->json($result);

        }

      }
      $result['message'] = '删除失败';
      return response()->json($result);

    }

    public function webdashubaosendadminmessage(Request $request)
    {
        $isfajian = 1;
        $title = $request->title ?: '';
        $redirect_url = $request->redirect_url ?: '';
        return view('novel.messageshow', compact('isfajian','title','redirect_url'));
    }

    public function wapdashubaosendadminmessage(Request $request)
    {
        $isfajian = 1;
        $title = $request->title ?: '';
        $redirect_url = $request->redirect_url ?: '';
        return view('novel.mmessageshow', compact('request','isfajian','title','redirect_url'));
    }



    public function sendmessage(Request $request)
    {
        $user = $request->user();
        $result = ['error'=>0,'message'=>'未知错误','bakdata'=>[]];

        if (empty($user)) {
            $result['message'] = '还没有登录';
            return response()->json($result);
        }

        $content =trim($request->content);
        $title = trim($request->title);
        //$from = trim($request->from);
        //$from = $from ? '_'.$from : '';
        if(empty($content) || empty($title)){
            $result['message'] = '内容、标题有一项为空了';
            return response()->json($result);
        }
        if ($this->isDuplicateMessage($content)) {
            $result['message'] = '请不要发布重复内容。';
            return response()->json($result);
        }
        //$content = \Purifier::clean($content,'xiaoshuo_body');
        $data['postdate'] = time();
        $data['fromname'] = $user->uname;
        $data['content'] = $content;
        $data['title'] = $title;
        $data['toid'] = 0 ;
        $data['toname'] = '';
        $message =  $user->relationOutboxs()
                          ->create($data);
        if (!$message) {
            $result['message'] = '数据库繁忙稍后再试！';
            return response()->json($result);
        }

        $result['message'] = '举报成功,回复请到邮箱查看';
        $result['error'] = 1;
        return response()->json($result);
    }
}
