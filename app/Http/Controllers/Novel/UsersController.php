<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Support\MessageBag;
use App\Models\Article;
use App\Models\Ranking;
class UsersController extends Controller
{
    public function webdashubaouserindex()
    {
      $user = Auth::user();
      return view('novel.userindex',compact('user'));
    }


    public function wapdashubaouserindex(Request $request)
    {
      $user = Auth::user();
      return view('novel.muserindex',compact('user','request'));
    }



    public function webdashubaopassedit()
    {

      return view('novel.passedit');
    }

    public function wapdashubaopassedit(Request $request)
    {

      return view('novel.mpassedit',compact('request'));
    }

    public function webdashubaopassupdate(Request $request)
    {

        $user = Auth::user();
        if (md5($request->pass)  !=  $user->pass) {
            $error = new MessageBag([
              'pass'   => '原始密码不对'
            ]);
            return
                    redirect()->back()
                              ->withErrors($error);
        }

        $this->validate($request, [
            'newpass'   => 'required|confirmed|min:6|max:16',
            'newpass_confirmation'           => 'required|min:6|max:16',
        ]);


        if ($request->pass  ==  $request->newpass) {
            $error = new MessageBag([
              'newpass'   => '原始密码与新密码不能相同'
            ]);
            return
                    redirect()->back()
                              ->withInput()
                              ->withErrors($error);
        }

        try {
            $user->pass = md5($request->newpass);
            $user->save();
            return redirect()->route('web.dashubaouserindex',[], false);
        } catch (\Exception $exception) {
            $error = new MessageBag([
              'pass'   => '修改密码失败'
            ]);
            return redirect()->back()->withErrors($error);
        }
    }


    public function wapdashubaopassupdate(Request $request)
    {

        $user = Auth::user();
        if (md5($request->pass)  !=  $user->pass) {
            $error = new MessageBag([
              'pass'   => '原始密码不对'
            ]);
            return
                    redirect()->back()
                              ->withErrors($error);
        }

        $this->validate($request, [
            'newpass'   => 'required|confirmed|min:6|max:16',
            'newpass_confirmation'           => 'required|min:6|max:16',
        ]);


        if ($request->pass  ==  $request->newpass) {
            $error = new MessageBag([
              'newpass'   => '原始密码与新密码不能相同'
            ]);
            return
                    redirect()->back()
                              ->withInput()
                              ->withErrors($error);
        }

        try {
            $user->pass = md5($request->newpass);
            $user->save();
            return redirect()->route('wap.dashubaouserindex',[], false);
        } catch (\Exception $exception) {
            $error = new MessageBag([
              'pass'   => '修改密码失败'
            ]);
            return redirect()->back()->withErrors($error);
        }
    }


    public function recommend(Request $request)
    {

        $user = $request->user();
        $result = ['message'=>'未知错误'];
        if (empty($user)) {
          $result['message'] = '还没有登录';
          return response()->json($result);
        }
        $num = $request->num > 0 ? $request->num : 1;
        $articleid = (int)$request->bid + 0 ;
        if ($articleid<=0) {
          $result['message'] = '操作非法';
          return response()->json($result);
        }
        $article  = Article::getBasicsBook()->find($articleid);
        if (empty($article)) {
          $result['message'] = '本书已经不存在了';
          return response()->json($result);
        }
        //用户拥有的今日推荐次数
        $userRecommendCount = (int)$user->dayrecommendcount;
        //用户今天使用了多少票
        $userHits = (int)$user->relationRankingsUseHits();
        if ($num > $userRecommendCount || ($userHits+$num) > $userRecommendCount ) {
          $result['message'] = "您没有那么多推荐票,已用{$userHits},总数{$userRecommendCount}";
          return response()->json($result);
        }
        $date = date("Y-m-d",time());
        $date = strtotime($date);
        $s = config('app.recommendscore');//增长的经验
        $s = $s * $num;
        //这本书今日有没有被推荐过
        $ranking = $user->relationRankingsTodyBookHits($articleid);
        //剩余票数
        $sheng = (int)($userRecommendCount - $num - $userHits);
        if(!$ranking){
            $data = [
              'uid'=>$user->uid,
              'articleid' => $articleid,
              'ranking_date' => $date,
              'hits' => $num,
            ];

            try {
              Ranking::create($data);
              $user->increment('score' , $s);
              $result['message'] = "推荐成功,获取 {$s} 点经验 剩余 {$sheng} 票";
              return response()->json($result);
            } catch (\Exception $e) {
              $result['message'] = '推荐出错了,请联系管理员';
              return response()->json($result);

            }

        }
        //如果这本书已经有推荐
        $ranking->increment('hits' , $num);
        $user->increment('score' , $s);
        $result['message'] = "推荐成功！获取 {$s} 点经验 剩余 {$sheng} 票";
        return response()->json($result);
    }
}
