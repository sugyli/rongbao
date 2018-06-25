<style type="text/css">
.manage{width:960px;margin:0 auto;overflow:hidden;clear:both;}
.manage a{color:#000}
.manage .manage_top{border:1px solid #dee1e6;padding:10px;overflow:hidden;width:100%;background:#eeffff;}
.manage input{margin-top:8px;margin-right:5px;}
.manage .button{padding:5px;border:1px solid #dee1e6;cursor:pointer;}
.manage .manage_top dt{font-size:14px;font-weight:bold;text-align:center;clear:both;height:40px;line-height:40px;}
.manage .manage_top .title{height:80px;padding:10px 0;background:#fff;}
.manage .manage_top span{display:block;line-height:30px;}
.manage .manage_top dd{float:left;width:50%;height:25px;line-height:25px;}
.manage .manage_bottom{border:1px solid #dee1e6;text-align:center;margin:10px 0;}
.manage .manage_bottom dt{border-bottom:2px solid #dee1e6;font-size:14px;font-weight:bold;clear:both;height:30px;line-height:30px;}
.manage .manage_bottom dd{line-height:30px;background:#eeffff;}
.manage .manage_bottom dd select{margin-left:15px;padding:3px;margin-top:10px;}

</style>
<section class="manage">
  <form name="chapterdel" id="chapterdel" action="https://www.88dus.com/modules/article/chaptersdel.php?do=submit" method="post">
    <dl class="manage_top">
      <dt class="title">
        <span>《{{$bookData->articlename}}》[<a href="{{$bookData->webdashubaoinfolink}}" target="_blank">信息</a>]</span>
        <span>
          [<a href="javascript:alert('开发中');">新建分卷</a>]
          [<a href="javascript:alert('开发中');">增加章节</a>]
          [<a href="{{route('article.editinfo',['id'=>$bookData->articleid], false)}}">编辑文章</a>]
          [<a href="javascript:alert('开发中');">删除文章</a>]
          [<a href="javascript:alert('开发中');">清空文章</a>]
          [<a href="javascript:alert('开发中');">管理书评</a>]
        </span>
      </dt>
      @if($bookData->relationChapters->count() > 0)
        @foreach ($bookData->relationChapters as $chapter)
        <dd><input type="checkbox" name="chapterid[]" value="27950495"><a href="{{config('app.web_dashubao_url')}}{{$chapter->webdashubaocontentlink}}" target="_blank" title="{{$chapter->articlename}}">{{$chapter->chaptername}}</a> <a href="https://www.88dus.com/modules/article/chapteredit.php?id=27950495&amp;chaptertype=0">[编]</a> <a href="javascript:if(confirm('确实要删除该章节么？')) document.location='https://www.88dus.com/modules/article/chapterdel.php?id=27950495&amp;chaptertype=0';">[删]</a></dd>
        @endforeach
      @endif
      <dt>
        <input type="hidden" name="articleid" id="articleid" value="89336">
        <input type="button" name="allcheck" value="选择全部章节" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ this.form.elements[i].checked = true; }">&nbsp;&nbsp;
        <input type="button" name="nocheck" value="取消全部选中" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ this.form.elements[i].checked = false; }">&nbsp;&nbsp;
        <input type="button" name="delcheck" value="批量删除章节" class="button" onclick="javascript:if(confirm('确实要批量删除章节么？')){this.form.submit();}">
      </dt>
    </dl>
  </form>

  <form name="chaptersort" id="chaptersort" action="https://www.88dus.com/modules/article/chaptersort.php?do=submit" method="post">
    <dl class="manage_bottom">
      <dt>章节排序</dt>
      <dd>将章节：
        <select size="1" name="fromid" id="fromid">
          <option value="1">|-001【初到津门】</option>



  <option value="2">|-002【租房落脚】</option>



  <option value="3">|-003【仙侠宗师】</option>



  <option value="4">|-004【射雕英雄传】</option>



  <option value="5">|-005【千字一元】</option>



  <option value="6">|-006【穿越者的茫然】</option>



  <option value="7">|-007【变天】</option>



  <option value="8">|-008【民国第一诗人】</option>



  <option value="9">|-009【大帅有请】</option>



  <option value="10">|-010【惑乱军心】</option>



  <option value="11">|-011【装逼过头】</option>



  <option value="12">|-012【拆皇帝家大门】</option>



  <option value="13">|-013【惊天秘计】</option>



  <option value="14">|-014【一个妈生的】</option>



  <option value="15">|-015【屠刀】</option>



  <option value="16">|-016【大婚】</option>



  <option value="17">|-017【法国领事夫人】</option>



  <option value="18">|-018【沙龙赴约】</option>



  <option value="19">|-019【开讲】</option>



  <option value="20">|-020【是时候展现真正的技术了】</option>



  <option value="21">|-021【大贤遗野】</option>



  <option value="22">|-022【乐不思蜀】</option>



  <option value="23">|-023【策问】</option>



  <option value="24">|-024【段公子】</option>



  <option value="25">|-025【各有所忧】</option>



  <option value="26">|-026【天下大势】</option>



  <option value="27">|-027【撩】</option>



  <option value="28">|-028【忧喜自得】</option>



  <option value="29">|-029【三成版税】</option>



  <option value="30">|-030【摩登伽女】</option>



  <option value="31">|-031【冬皇】</option>



  <option value="32">|-032【二等二级中校副官周赫煊是也】</option>



  <option value="33">|-033【恶人自有恶人磨】</option>



  <option value="34">|-034【武当剑仙】</option>



  <option value="35">|-035【发酵】</option>



  <option value="36">|-036【周赫煊吾师也】</option>



  <option value="37">|-037【上门讨教】</option>



  <option value="38">|-038【少帅】</option>



  <option value="39">|-039【调职】</option>



  <option value="40">|-040【神魔乱舞的大帅府】</option>



  <option value="41">|-041【利益使然】</option>



  <option value="42">|-042【养望】（为盟主烹鲤鱼加更）</option>



  <option value="43">|-043【戒大烟】</option>



  <option value="44">|-044【不党、不私、不卖、不盲】</option>



  <option value="45">|-045【奉系清流】</option>



  <option value="46">|-046【爱国教育】</option>



  <option value="47">|-047【刀妃革命】</option>



  <option value="48">|-048【新的计划】</option>



  <option value="49">|-049【乔迁新居】</option>



  <option value="50">|-050【忽悠捐款】</option>



  <option value="51">|-051【断发明志】</option>



  <option value="52">|-052【响应】</option>



  <option value="53">|-053【志摩】</option>



  <option value="54">|-054【诗人周赫煊】</option>



  <option value="55">|-055【少女情怀总是诗】</option>



  <option value="56">|-056【接连登门】</option>



  <option value="57">|-057【进京】</option>



  <option value="58">|-058【传说中的周先生】</option>



  <option value="59">|-059【我有一个梦想】</option>



  <option value="60">|-060【抵达清华】</option>



  <option value="61">|-061【诚则明也】</option>



  <option value="62">|-062【人情最大】</option>



  <option value="63">|-063【名传四方】</option>



  <option value="64">|-064【雅事】</option>



  <option value="65">|-065【再见】</option>



  <option value="66">|-066【褚二爷】</option>



  <option value="67">|-067【比谁拳头大】</option>



  <option value="68">|-068【杀心起】</option>



  <option value="69">|-069【希望小学】</option>



  <option value="70">|-070【惨案】</option>



  <option value="71">|-071【狗血】</option>



  <option value="72">|-072【讲故事】</option>



  <option value="73">|-073【又见情诗】</option>



  <option value="74">|-074【差事】</option>



  <option value="75">|-075【侯七VS马六】</option>



  <option value="76">|-076【卸磨杀驴VS兔子咬人】</option>



  <option value="77">|-077【避难】</option>



  <option value="78">|-078【蠢得像头猪】</option>



  <option value="79">|-079【灭口】</option>



  <option value="80">|-080【了结】</option>



  <option value="81">|-081【出气筒】</option>



  <option value="82">|-082【打一顿就好了】</option>



  <option value="83">|-083【火种】</option>



  <option value="84">|-084【神女】</option>



  <option value="85">|-085【魔幻现实主义】</option>



  <option value="86">|-086【空前绝后的证婚词】</option>



  <option value="87">|-087【卑鄙是卑鄙者的通行证】</option>



  <option value="88">|-088【爱国诗人】</option>



  <option value="89">|-089【清华讲课】</option>



  <option value="90">|-090【学霸太多】</option>



  <option value="91">|-091【活曹操】</option>



  <option value="92">|-092【又被坑了】</option>



  <option value="93">|-093【当官了】</option>



  <option value="94">|-094【小钱钱】</option>



  <option value="95">|-095【小说还能这样写？】</option>



  <option value="96">|-096【北大复课】</option>



  <option value="97">|-097【忽悠】</option>



  <option value="98">|-098【忍辱负重】</option>



  <option value="99">|-099【谈文学创作】</option>



  <option value="100">|-100【副刊就绪】</option>



  <option value="101">|-101【郑证因】</option>



  <option value="102">|-102【又一个入伙的】</option>



  <option value="103">|-103【丈母娘看女婿】</option>



  <option value="104">|-104【少帅的忧心】</option>



  <option value="105">|-105【被人求字】</option>



  <option value="106">|-106【去东北】</option>



  <option value="107">|-107【一把火】</option>



  <option value="108">|-108【追更】</option>



  <option value="109">|-109【砸玻璃】</option>



  <option value="110">|-110【万寿】</option>



  <option value="111">|-111【死心】</option>



  <option value="112">|-112【和平分手】</option>



  <option value="113">|-113【画画】</option>



  <option value="114">|-114【厮磨】</option>



  <option value="115">|-115【妇女解放】</option>



  <option value="116">|-116【样品】</option>



  <option value="117">|-117【轻啄】</option>



  <option value="118">|-118【抵沪】</option>



  <option value="119">|-119【舞厅】</option>



  <option value="120">|-120【毛妹】</option>



  <option value="121">|-121【合作】</option>



  <option value="122">|-122【购画】</option>



  <option value="123">|-123【国际友人】</option>



  <option value="124">|-124【农村大地】</option>



  <option value="125">|-125【建厂】</option>



  <option value="126">|-126【剪发潮】</option>



  <option value="127">|-127【搞个大新闻】</option>



  <option value="128">|-128【文妖周赫煊】</option>



  <option value="129">|-129【狂士】</option>



  <option value="130">|-130【热卖】</option>



  <option value="131">|-131【女校演讲】</option>



  <option value="132">|-132【妇女之友】</option>



  <option value="133">|-133【难民】</option>



  <option value="134">|-134【袁公子】</option>



  <option value="135">|-135【荒唐名士】</option>



  <option value="136">|-136【青帮百相】</option>



  <option value="137">|-137【青红】</option>



  <option value="138">|-138【豪杰】</option>



  <option value="139">|-139【以工代赈】</option>



  <option value="140">|-140【义演】</option>



  <option value="141">|-141【夜袭】</option>



  <option value="142">|-142【虚伪】</option>



  <option value="143">|-143【三毛连载】</option>



  <option value="144">|-144【翘家千金】</option>



  <option value="145">|-145【吃人】</option>



  <option value="146">|-146【泛淤】</option>



  <option value="147">|-147【说服】</option>



  <option value="148">|-148【坦白】</option>



  <option value="149">|-149【我是他未婚妻】</option>



  <option value="150">|-150【问答】</option>



  <option value="151">|-151【借钱】</option>



  <option value="152">|-152【狗官】</option>



  <option value="153">|-153【学生们最痛恨的作家】</option>



  <option value="154">|-154【还珠楼主的处女作】</option>



  <option value="155">|-155【画家和文物贩子】</option>



  <option value="156">|-156【金石其心，芝兰其室】</option>



  <option value="157">|-157【去他妈的张宗昌】</option>



  <option value="158">|-158【冯庸大学】</option>



  <option value="159">|-159【军事化办学】</option>



  <option value="160">|-160【田中奏折】</option>



  <option value="161">|-161【作大死】</option>



  <option value="162">|-162【神秘少女】</option>



  <option value="163">|-163【偶遇】</option>



  <option value="164">|-164【千里示警】</option>



  <option value="165">|-165【应对之计】</option>



  <option value="166">|-166【讨薪】</option>



  <option value="167">|-167【赚钱方案】</option>



  <option value="168">|-168【编教材】</option>



  <option value="169">|-169【古怪的老头儿】</option>



  <option value="170">|-170【明白人】</option>



  <option value="171">|-171【人类学著作】</option>



  <option value="172">|-172【美国出版商】</option>



  <option value="173">|-173【褚二爷的新猎物】</option>



  <option value="174">|-174【菊花般的爱情】</option>



  <option value="175">|-175【接头见面】</option>



  <option value="176">|-176【一条好狗】</option>



  <option value="177">|-177【玄洋社】</option>



  <option value="178">|-178【开业酒会】</option>



  <option value="179">|-179【英雄救美】</option>



  <option value="180">|-180【留在身边】（为盟主“老王短又小”加更）</option>



  <option value="181">|-181【美国推销员】</option>



  <option value="182">|-182【推荐你一本好书】</option>



  <option value="183">|-182【精英青睐】</option>



  <option value="184">|-184【征辟】（为盟主“ 狎鸥亭刘赫”加更）</option>



  <option value="185">|-185【非主流美国将军】</option>



  <option value="186">|-186【黑色幽默】</option>



  <option value="187">|-187【万民伞】</option>



  <option value="188">|-188【法国采访】（为盟主“老王真的短又小”加更）</option>



  <option value="189">|-189【告别】</option>



  <option value="190">|-190【广播电台】</option>



  <option value="191">|-191【美国商人】</option>



  <option value="192">|-192【新书】（为盟主“乡村鼓楼”加更）</option>



  <option value="193">|-193【吸引火力】</option>



  <option value="194">|-194【南开】</option>



  <option value="195">|-195【文明】</option>



  <option value="196">|-196【人类历史学】</option>



  <option value="197">|-197【电台开播】</option>



  <option value="198">|-198【不识抬举】</option>



  <option value="199">|-199【息事宁人】</option>



  <option value="200">|-200【访谈节目】</option>



  <option value="201">|-201【电声杂文】</option>



  <option value="202">|-202【迫不及待】</option>



  <option value="203">|-203【私语】</option>



  <option value="204">|-204【惨案】</option>



  <option value="205">|-205【退股】（为盟主“丁博约”加更）</option>



  <option value="206">|-206【菊与刀】（为盟主“落幕_悲伤”加更）</option>



  <option value="207">|-207【赴鲁赈灾】</option>



  <option value="208">|-208【哈雷特·阿班】</option>



  <option value="209">|-209【歪曲报道】</option>



  <option value="210">|-210【红粮问题】</option>



  <option value="211">|-201【军师】</option>



  <option value="212">|-202【乌合之众】</option>



  <option value="213">|-203【熟人】 （为盟主“Seven丶小七”加更）</option>



  <option value="214">|-214【押解】</option>



  <option value="215">|-215【周先生，咱拜把子吧】</option>



  <option value="216">|-216【借兵】</option>



  <option value="217">|-217【各种骂娘】</option>



  <option value="218">|-218【出逃乱象】</option>



  <option value="219">|-219【除害】</option>



  <option value="220">|-220【故事】</option>



  <option value="221">|-221【买房】</option>



  <option value="222">|-222【变天】</option>



  <option value="223">|-223【美国脑残粉】</option>



  <option value="224">|-224【校长】</option>



  <option value="225">|-225【三乐堂】</option>



  <option value="226">|-226【说客】（为盟主“老王真的真的短又小”加更）</option>



  <option value="227">|-227【内外妥协】</option>



  <option value="228">|-228【铁杆书迷】</option>



  <option value="229">|-229【南戴北周】</option>



  <option value="230">|-230【新合伙人】</option>



  <option value="231">|-231【喜】</option>



  <option value="232">|-232【仙侠小说】</option>



  <option value="233">|-233【将军，给钱吧】</option>



  <option value="234">|-224【再到上海】</option>



  <option value="235">|-235【坐谈】</option>



  <option value="236">|-236【党即是法】</option>



  <option value="237">|-237【交锋】</option>



  <option value="238">|-238【大水冲了龙王庙】</option>



  <option value="239">|-239【可悲】</option>



  <option value="240">|-240【教育部现状】</option>



  <option value="241">|-241【理想与现实】（求月票）</option>



  <option value="242">|-242【扯着蛋】</option>



  <option value="243">|-243【私心】</option>



  <option value="244">|-244【厚黑教主】</option>



  <option value="245">|-245【封你做副教主】（为盟主“往事成烟”加更）</option>



  <option value="246">|-246【机器和人力的比赛】</option>



  <option value="247">|-247【推广】</option>



  <option value="248">|-248【情敌】</option>



  <option value="249">|-249【上门】</option>



  <option value="250">|-250【讨好丈母娘】</option>



  <option value="251">|-251【悬乎】</option>



  <option value="252">|-252【请媒人】</option>



  <option value="253">|-253【借势】</option>



  <option value="254">|-254【订婚】</option>



  <option value="255">|-255【迎回周校长】</option>



  <option value="256">|-256【狗皮膏药校长】</option>



  <option value="257">|-257【又要抄书了】</option>



  <option value="258">|-258【非主流课程】</option>



  <option value="259">|-259【恼骚】</option>



  <option value="260">|-260【摸金校尉孙老殿】</option>



  <option value="261">|-261【亡国之君难当】</option>



  <option value="262">|-262【科幻小说】</option>



  <option value="263">|-263【北大校花】</option>



  <option value="264">|-264【文学少女】</option>



  <option value="265">|-265【舆论攻势】</option>



  <option value="266">|-266【天真】</option>



  <option value="267">|-267【计策】</option>



  <option value="268">|-268【阎老西】</option>



  <option value="269">|-269【算账】</option>



  <option value="270">|-270【麻烦真多】</option>



  <option value="271">|-271【川越】</option>



  <option value="272">|-272【考古】</option>



  <option value="273">|-273【坏人才能当军阀】</option>



  <option value="274">|-274【汤因比】</option>



  <option value="275">|-275【会面】</option>



  <option value="276">|-276【论宗教】</option>



  <option value="277">|-277【预言者】</option>



  <option value="278">|-278【婚期将近】</option>



  <option value="279">|-279【震惊：女婿要上天！】</option>



  <option value="280">|-280【爱面子的阎部长】</option>



  <option value="281">|-281【开飞机贺喜】</option>



  <option value="282">|-282【吃亏】</option>



  <option value="283">|-283【断章】</option>



  <option value="284">|-284【年鉴学派创始人】</option>



  <option value="285">|-285【小路易】</option>



  <option value="286">|-286【奇葩作家】</option>



  <option value="287">|-287【声名鹊起】</option>



  <option value="288">|-288【诺贝尔候选人】</option>



  <option value="289">|-289【急电】</option>



  <option value="290">|-290【一个时代结束】</option>



  <option value="291">|-291【查贪】</option>



  <option value="292">|-292【一锅端】</option>



  <option value="293">|-293【捐赠】</option>



  <option value="294">|-294【废除中医】</option>



  <option value="295">|-295【论战】</option>



  <option value="296">|-296【薛疯子】</option>



  <option value="297">|-297【论传统武术】</option>



  <option value="298">|-298【剑掌无双周赫煊】</option>



  <option value="299">|-299【战火再起】</option>



  <option value="300">|-300【思想】</option>



  <option value="301">|-301【采访】</option>



  <option value="302">|-302【丑儿】</option>



  <option value="303">|-303【偶遇】</option>



  <option value="304">|-304【豆汁儿】</option>



  <option value="305">|-305【灵均】</option>



  <option value="306">|-306【无休无止的学潮】</option>



  <option value="307">|-307【乔帮主】</option>



  <option value="308">|-308【热爱炒股的间谍先生】</option>



  <option value="309">|-309【三只狐狸】</option>



  <option value="310">|-310【中东路】</option>



  <option value="311">|-311【步步错】</option>



  <option value="312">|-312【科幻小说】</option>



  <option value="313">|-313【抵美】</option>



  <option value="314">|-314【洪门】</option>



  <option value="315">|-315【完美演出】</option>



  <option value="316">|-316【股神】</option>



  <option value="317">|-317【心惊胆战】</option>



  <option value="318">|-318【自杀潮】</option>



  <option value="319">|-319【好生意】</option>



  <option value="320">|-320【五洲洪门】</option>



  <option value="321">|-321【新服】</option>



  <option value="322">|-322【仪式】</option>



  <option value="323">|-322【罗斯福】</option>



  <option value="324">|-324【隆中对】</option>



  <option value="325">|-325【哥大邀请】</option>



  <option value="326">|-326【战争与和平】</option>



  <option value="327">|-327【导师】</option>



  <option value="328">|-328【中国文坛第一人】</option>



  <option value="329">|-329【巴黎】</option>



  <option value="330">|-330【华工】</option>



  <option value="331">|-331【纪念】</option>



  <option value="332">|-332【另类领奖】</option>



  <option value="333">|-333【风起】</option>



  <option value="334">|-334【副馆长和设计师】</option>



  <option value="335">|-335【考察】</option>



  <option value="336">|-336【蒋作宾】</option>



  <option value="337">|-337【周赫煊的猫】</option>



  <option value="338">|-338【邀请】</option>



  <option value="339">|-339【全民热议】</option>



  <option value="340">|-340【莫斯科】</option>



  <option value="341">|-341【强势】</option>



  <option value="342">|-342【表情包】</option>



  <option value="343">|-343【再会】</option>



  <option value="344">|-344【死局】</option>



  <option value="345">|-345【心腹】</option>



  <option value="346">|-346【政坛搅屎棍】</option>



  <option value="347">|-347【瑰宝】</option>



  <option value="348">|-348【书生】</option>



  <option value="349">|-349【留学基金】</option>



  <option value="350">|-350【回家】</option>



  <option value="351">|-351【崔家姐妹】</option>



  <option value="352">|-352【才女】</option>



  <option value="353">|-353【拐带良家妇女】</option>



  <option value="354">|-354【土豪】</option>



  <option value="355">|-355【买卖】</option>



  <option value="356">|-356【维烈】</option>



  <option value="357">|-357【剧场版大船】</option>



  <option value="358">|-358【疯狂】</option>



  <option value="359">|-359【空缺的普利策历史奖】</option>



  <option value="360">|-360【钱钟书和钱穆】</option>



  <option value="361">|-361【完颜立童记】</option>



  <option value="362">|-362【我爱这土地】</option>



  <option value="363">|-263【鲁梁骂战】</option>



  <option value="364">|-264【一猜就中】</option>



  <option value="365">|-265【巴金】</option>



  <option value="366">|-366【战争与贫困】</option>



  <option value="367">|-367【香山旅游团】</option>



  <option value="368">|-368【写诗】</option>



  <option value="369">|-369【诗与情】</option>



  <option value="370">|-370【可知少女心事？】</option>



  <option value="371">|-371【缘分】</option>



  <option value="372">|-372【留学生】</option>



  <option value="373">|-373【批发字画】</option>



  <option value="374">|-374【名人字画收割者】</option>



  <option value="375">|-375【电影公司】</option>



  <option value="376">|-376【大坑货】</option>



  <option value="377">|-377【红颜薄命】</option>



  <option value="378">|-378【都不靠谱】</option>



  <option value="379">|-379【一场烂仗】</option>



  <option value="380">|-380【好人，坏人】</option>



  <option value="381">|-381【青帮三大佬】</option>



  <option value="382">|-382【脑子是个好东西】</option>



  <option value="383">|-383【做事漂亮】</option>



  <option value="384">|-383【法国总领事也是书迷】</option>



  <option value="385">|-385【文艺沙龙】</option>



  <option value="386">|-386【私卖烟土】</option>



  <option value="387">|-387【周先生要出手】</option>



  <option value="388">|-388【阿门】</option>



  <option value="389">|-389【坐地起价】</option>



  <option value="390">|-390【拖延麻痹】</option>



  <option value="391">|-391【铁口铜牙】（为盟主“允儿骑士”加更）</option>



  <option value="392">|-387【奉军入关】</option>



  <option value="393">|-388【战事尾声】</option>



  <option value="394">|-389【贪官污吏】</option>



  <option value="395">|-390【北方教育界的破事】</option>



  <option value="396">|-391【又一个四小姐】</option>



  <option value="397">|-392【有声电影】</option>



  <option value="398">|-393【第一个现代汉语拼音学习者】</option>



  <option value="399">|-394【影坛一姐】</option>



  <option value="400">|-395【麻将·市井】</option>



  <option value="401">|-396【中国报业协会】</option>



  <option value="402">|-397【职业操守】</option>



  <option value="403">|-398【萧三爷】</option>



  <option value="404">|-399【水落石出】</option>



  <option value="405">|-400【汉语和汉字】</option>



  <option value="406">|-401【教科书】</option>



  <option value="407">|-402【重新定义世界史】</option>



  <option value="408">|-403【中央大学也缺钱】</option>



  <option value="409">|-404【一次预言，一场演讲】</option>



  <option value="410">|-405【归化派翻译家】</option>



  <option value="411">|-406【老徐的烦恼】</option>



  <option value="412">|-407【宁粤之争】</option>



  <option value="413">|-408【张家老二】</option>



  <option value="414">|-409【惊天秘闻】</option>



  <option value="415">|-410【共济会】</option>



  <option value="416">|-411【搪瓷流水线】</option>



  <option value="417">|-412【建厂计划】</option>



  <option value="418">|-413【新出炉的教科书】</option>



  <option value="419">|-414【海军与胖子】</option>



  <option value="420">|-415【范哈儿】</option>



  <option value="421">|-416【巴蜀王】</option>



  <option value="422">|-417【刘神仙】（为盟主“无聊的倒霉熊”加更）</option>



  <option value="423">|-418【玩命的演习】</option>



  <option value="424">|-419【科普】</option>



  <option value="425">|-420【斗法】</option>



  <option value="426">|-421【东华帝君】</option>



  <option value="427">|-422【神仙打架】</option>



  <option value="428">|-423【收徒】</option>



  <option value="429">|-424【同道中人】</option>



  <option value="430">|-425【前往重大】</option>



  <option value="431">|-426【宣传】</option>



  <option value="432">|-427【工科】</option>



  <option value="433">|-428【庐山别墅】</option>



  <option value="434">|-429【名人拜访】</option>



  <option value="435">|-430【太太家的客厅】</option>



  <option value="436">|-431【中国工人】</option>



  <option value="437">|-432【国事】</option>



  <option value="438">|-433【呜呼哀哉】</option>



  <option value="439">|-434【及时雨】</option>



  <option value="440">|-435【危局】</option>



  <option value="441">|-436【老毛病】</option>



  <option value="442">|-437【劝谏】</option>



  <option value="443">|-438【再劝】</option>



  <option value="444">|-439【国耻】</option>



  <option value="445">|-440【进退】</option>



  <option value="446">|-441【七人背】</option>



  <option value="447">|-442【东北民众抗日救国会】</option>



  <option value="448">|-443【看破红尘的张二公子】</option>



  <option value="449">|-444【川岛芳子的任务】</option>



  <option value="450">|-445【遇到同行】</option>



  <option value="451">|-446【见血】</option>



  <option value="452">|-447【内斗】</option>



  <option value="453">|-448【义勇军出征】</option>



  <option value="454">|-449【饭桶胡适先生的努力】</option>



  <option value="455">|-450【文章】</option>



  <option value="456">|-451【闲谈】</option>



  <option value="457">|-452【拖死日本才是正途】</option>



  <option value="458">|-453【剖腹明志第一人】</option>



  <option value="459">|-454【一点小礼物】</option>



  <option value="460">|-455【好消息】</option>



  <option value="461">|-456【默契】</option>



  <option value="462">|-457【窝囊废市长】</option>



  <option value="463">|-458【谈不拢啊】</option>



  <option value="464">|-459【回应】</option>



  <option value="465">|-460【扒电车公司的黑底】</option>



  <option value="466">|-461【大地头蛇】</option>



  <option value="467">|-462【无计可施】</option>



  <option value="468">|-463【国难？】</option>



  <option value="469">|-464【签名游戏】</option>



  <option value="470">|-465【扯淡会议】</option>



  <option value="471">|-466【周先生发言】</option>



  <option value="472">|-467【青年党】</option>



  <option value="473">|-468【孙子】</option>



  <option value="474">|-469【屁股歪了，脑袋也不好使】</option>



  <option value="475">|-470【论佛】</option>



  <option value="476">|-471【小白鼠】</option>



  <option value="477">|-472【修身、治国和心理学】</option>



  <option value="478">|-473【欲望、理智和道德】</option>



  <option value="479">|-474【非战会议】</option>



  <option value="480">|-475【国际反法斯西同盟】</option>



  <option value="481">|-476【讨论】</option>



  <option value="482">|-477【工党领袖】</option>



  <option value="483">|-478【伦敦政经学院】</option>



  <option value="484">|-479【日落西山】</option>



  <option value="485">|-480【薇薇安】</option>



  <option value="486">|-481【妖魔鬼怪】</option>



  <option value="487">|-482【王子的邀请】</option>



  <option value="488">|-482【王子的邀请】</option>



  <option value="489">|-483【轰动】</option>



  <option value="490">|-484【绝代佳人】</option>



  <option value="491">|-485【口口口口……吃】</option>



  <option value="492">|-486【贵族的遮羞布】</option>



  <option value="493">|-487【论喷子的历史素养】</option>



  <option value="494">|-488【犯贱】</option>



  <option value="495">|-489【大忽悠】</option>



  <option value="496">|-490【本能】</option>



  <option value="497">|-491【男人的占有欲】</option>



  <option value="498">|-492【周先生是语言学家】</option>



  <option value="499">|-493【伟大的段子手】</option>



  <option value="500">|-494【神药计划】</option>



  <option value="501">|-495【我心永恒】</option>



  <option value="502">|-496【实验成果】</option>



  <option value="503">|-497【买房才能申请专利】</option>



  <option value="504">|-498【支招】</option>



  <option value="505">|-499【发现】</option>



  <option value="506">|-500【艰难的选择】</option>



  <option value="507">|-501【丘吉尔】</option>



  <option value="508">|-502【丘胖子的知己】</option>



  <option value="509">|-503【追更的丘吉尔】</option>



  <option value="510">|-504【返航】</option>



  <option value="511">|-505【虚伪的老头儿】</option>



  <option value="512">|-506【驳斥】</option>



  <option value="513">|-507【中国也有大师】</option>



  <option value="514">|-508【论文明与法】</option>



  <option value="515">|-509【服软】</option>



  <option value="516">|-510【策问】</option>



  <option value="517">|-511【黄老之术】</option>



  <option value="518">|-512【逐本求末】</option>



  <option value="519">|-513【神女上映】</option>



  <option value="520">|-514【看电影】</option>



  <option value="521">|-515【中国电影二三事】</option>



  <option value="522">|-516【威尔斯与银英传】</option>



  <option value="523">|-517【我们的征途是星辰大海】</option>



  <option value="524">|-518【严峻的问题】</option>



  <option value="525">|-519【女管家】</option>



  <option value="526">|-520【各有所思】</option>



  <option value="527">|-521【小胖墩儿】</option>



  <option value="528">|-522【小狐狸与玫瑰花】</option>



  <option value="529">|-523【串联】</option>



  <option value="530">|-524【新年的梦想】</option>



  <option value="531">|-525【长城抗战】</option>



  <option value="532">|-526【文物南迁】</option>



  <option value="533">|-527【北平分会成立】</option>



  <option value="534">|-528【陆军监狱】</option>



  <option value="535">|-529【少帅下野】</option>



  <option value="536">|-530【叛徒，也是烈士】</option>



  <option value="537">|-531【阵痛】</option>



  <option value="538">|-532【罗斯福的圈套】</option>



  <option value="539">|-530【敌后抗战】</option>



  <option value="540">|-531【松花江上】</option>



  <option value="541">|-532【二十九军】</option>



  <option value="542">|-533【背锅小王子】</option>



  <option value="543">|-534【收徒弟】</option>



  <option value="544">|-535【准备写小说】</option>



  <option value="545">|-536【东北史诗】</option>



  <option value="546">|-537【罗素伯爵】</option>



  <option value="547">|-538【磺胺的威力】</option>



  <option value="548">|-539【忧患】</option>



  <option value="549">|-540【非攻】</option>



  <option value="550">|-541【黑土】</option>



  <option value="551">|-542【应聘】</option>



  <option value="552">|-543【成功与麻烦】</option>



  <option value="553">|-544【喂狗】</option>



  <option value="554">|-545【乌烟瘴气】</option>



  <option value="555">|-546【又是地下党】</option>



  <option value="556">|-547【全运会】</option>



  <option value="557">|-548【悲哀的体育事业】</option>



  <option value="558">|-549【南国美人鱼】</option>



  <option value="559">|-550【砸了好多钱】</option>



  <option value="560">|-551【体育报国】</option>



  <option value="561">|-552【商业运作】</option>



  <option value="562">|-553【丢人现眼】</option>



  <option value="563">|-554【十四万人齐解甲，更无一个是男儿】</option>



  <option value="564">|-555【出名的费小姐】</option>



  <option value="565">|-556【小人暗算】</option>



  <option value="566">|-557【不要跟哲学家聊天】</option>



  <option value="567">|-558【京派海派】</option>



  <option value="568">|-559【费正清】</option>



  <option value="569">|-560【回忆录】</option>



  <option value="570">|-561【元宵节与新生活】</option>



  <option value="571">|-562【一场闹剧】</option>



  <option value="572">|-563【通风报信】</option>



  <option value="573">|-564【怕死和不怕死的】</option>



  <option value="574">|-565【逢场作戏】</option>



  <option value="575">|-566【新秘书上任】</option>



  <option value="576">|-567【忙碌的周先生】</option>



  <option value="577">|-568【评论文章】</option>



  <option value="578">|-569【抗战纲领】</option>



  <option value="579">|-570【南下】</option>



  <option value="580">|-571【凝聚】</option>



  <option value="581">|-572【毕业季】</option>



  <option value="582">|-573【留字】</option>



  <option value="583">|-574【鸿雁】</option>



  <option value="584">|-575【唱片公司】</option>



  <option value="585">|-576【音乐大才】</option>



  <option value="586">|-577【万里长城永不倒】</option>



  <option value="587">|-578【和尚也爱国】</option>



  <option value="588">|-579【太虚大和尚】</option>



  <option value="589">|-580【魔道】</option>



  <option value="590">|-581【妖僧】</option>



  <option value="591">|-582【难以解脱】</option>



  <option value="592">|-583【徐志摩失踪记】</option>



  <option value="593">|-584【找不见人】</option>



  <option value="594">|-585【全新版本】</option>



  <option value="595">|-586【电影皇帝和卖报歌】</option>



  <option value="596">|-587【阮玲玉的勇气】</option>



  <option value="597">|-588【一哭二闹三上吊】</option>



  <option value="598">|-589【封杀】</option>



  <option value="599">|-590【无锡】</option>



  <option value="600">|-591【遇事不决打麻将】</option>



  <option value="601">|-592【劳动最光荣】</option>



  <option value="602">|-593【死要面子】</option>



  <option value="603">|-594【蔫坏的老实人】</option>



  <option value="604">|-595【名人汇聚】</option>



  <option value="605">|-596【狂欢晚宴】</option>



  <option value="606">|-597【祥符文会之一】</option>



  <option value="607">|-598【祥符文会之二】</option>



  <option value="608">|-599【创作】</option>



  <option value="609">|-600【赞美】</option>



  <option value="610">|-601【现代派】</option>



  <option value="611">|-602【开山祖师】</option>



  <option value="612">|-603【内山书店】</option>



  <option value="613">|-604【禁歌】</option>



  <option value="614">|-605【斯诺采访】</option>



  <option value="615">|-606【承诺】</option>



  <option value="616">|-607【资本家的本性】</option>



  <option value="617">|-608【官司】</option>



  <option value="618">|-609【救人】</option>



  <option value="619">|-610【低调俱乐部】</option>



  <option value="620">|-611【发酵】</option>



  <option value="621">|-612【三阳线决战论】</option>



  <option value="622">|-613【人脉很重要】</option>



  <option value="623">|-614【远东检察官】</option>



  <option value="624">|-615【赌徒】</option>



  <option value="625">|-616【交易】</option>



  <option value="626">|-617【外交连环套】</option>



  <option value="627">|-618【变色龙】</option>



  <option value="628">|-619【论战再起】</option>



  <option value="629">|-620【家事与国事】</option>



  <option value="630">|-621【混血儿】</option>



  <option value="631">|-622【中美民间文化友好交流团】</option>



  <option value="632">|-623【失意的老宋】</option>



  <option value="633">|-624【抵达旧金山】</option>



  <option value="634">|-625【大中华戏院】</option>



  <option value="635">|-626【美好的明天】</option>



  <option value="636">|-627【唱双簧】</option>



  <option value="637">|-628【忽悠效果远超预期】</option>



  <option value="638">|-629【罗斯福的苦恼】</option>



  <option value="639">|-630【一锅粥】</option>



  <option value="640">|-631【弱国无外交】</option>



  <option value="641">|-632【阴险的瘸子】</option>



  <option value="642">|-633【改变计划】</option>



  <option value="643">|-634【真正的食腐秃鹫】</option>



  <option value="644">|-635【饕餮】</option>



  <option value="645">|-636【拜访王子】</option>



  <option value="646">|-637【巫师遇到巫师】</option>



  <option value="647">|-638【宝腾】</option>



  <option value="648">|-639【顺势而为】</option>



  <option value="649">|-640【贪婪的英国人】</option>



  <option value="650">|-641【大萧条下的好莱坞】</option>



  <option value="651">|-642【膨胀的电影皇帝】</option>



  <option value="652">|-643【小白脸上位】</option>



  <option value="653">|-644【入股】</option>



  <option value="654">|-645【满地捡钱】</option>



  <option value="655">|-646【赚钱与花钱】</option>



  <option value="656">|-647【私人飞行俱乐部】</option>



  <option value="657">|-648【P-26】</option>



  <option value="658">|-649【王安石与法西斯】</option>



  <option value="659">|-650【常凯申的四不精神】</option>



  <option value="660">|-651【长江大桥】</option>



  <option value="661">|-652【桥梁专家】</option>



  <option value="662">|-652【桥梁专家】</option>



  <option value="663">|-653【前往武昌】</option>



  <option value="664">|-654【负心汉】</option>



  <option value="665">|-655【法西斯就是抢劫犯】</option>



  <option value="666">|-656【我的祖国】</option>



  <option value="667">|-657【老蒋的参谋长】</option>



  <option value="668">|-658【恃才傲物】</option>



  <option value="669">|-659【捐飞机】</option>



  <option value="670">|-660【中国航空协会】</option>



  <option value="671">|-661【征招学员】</option>



  <option value="672">|-662【楼市崩盘】</option>



  <option value="673">|-663【上海首富】</option>



  <option value="674">|-664【交易】</option>



  <option value="675">|-665【荒诞世界】</option>



  <option value="676">|-666【妹妹】</option>



  <option value="677">|-667【拜访】</option>



  <option value="678">|-668【不是摹本，是祖本】</option>



  <option value="679">|-669【成舍我】</option>



  <option value="680">|-670【张恨水】</option>



  <option value="681">|-671【合作】</option>



  <option value="682">|-672【采玉章】</option>



  <option value="683">|-673【准备搬家】</option>



  <option value="684">|-674【国际宣传】</option>



  <option value="685">|-675【被歧视的美国佬】</option>



  <option value="686">|-676【万人迎接】</option>



  <option value="687">|-677【崇尚和平的英国】</option>



  <option value="688">|-678【好戏开始】</option>



  <option value="689">|-679【伟大的矮子民族】</option>



  <option value="690">|-680【幻灯片】</option>



  <option value="691">|-681【变态的民族】</option>



  <option value="692">|-682【追逐英雄】</option>



  <option value="693">|-683【刺杀】</option>



  <option value="694">|-684【混乱】</option>



  <option value="695">|-685【手术】</option>



  <option value="696">|-686【影响】</option>



  <option value="697">|-687【七轮决选】</option>



  <option value="698">|-688【欢庆】</option>



  <option value="699">|-689【推波助澜】</option>



  <option value="700">|-690【国际大学者周赫煊先生作品研究学习讨论会】</option>



  <option value="701">|-691【达成】</option>



  <option value="702">|-692【齐聚】</option>



  <option value="703">|-693【娱乐明星】</option>



  <option value="704">|-694【慈善家族】</option>



  <option value="705">|-695【文学界的独裁者】</option>



  <option value="706">|-696【领奖】</option>



  <option value="707">|-697【领奖致辞】</option>



  <option value="708">|-698【令人生厌的人与值得尊敬的人】</option>



  <option value="709">|-699【文物】</option>



  <option value="710">|-700【回程】</option>



  <option value="711">|-701【老丈人的要求】</option>



  <option value="712">|-702【元首的赞赏】</option>



  <option value="713">|-703【家中日常】</option>



  <option value="714">|-704【柏林】</option>



  <option value="715">|-705【元首亮相】</option>



  <option value="716">|-706【原来是小说迷】</option>



  <option value="717">|-707【先知周赫煊】</option>



  <option value="718">|-708【四大金刚】</option>



  <option value="719">|-709【中国运动员到来】</option>



  <option value="720">|-710【比划】</option>



  <option value="721">|-711【作弊方法】</option>



  <option value="722">|-712【中国的国球是足球？】</option>



  <option value="723">|-713【又是个特务头子】</option>



  <option value="724">|-714【又要发勋章】</option>



  <option value="725">|-715【家事】</option>



  <option value="726">|-716【争论】</option>



  <option value="727">|-717【杀了吧】</option>



  <option value="728">|-718【天狗吞日】</option>



  <option value="729">|-719【瞎子】</option>



  <option value="730">|-720【又是个鸦片鬼】</option>



  <option value="731">|-721【北边儿的委员长】</option>



  <option value="732">|-722【黑得丧心病狂】</option>



  <option value="733">|-723【挑动风云】</option>



  <option value="734">|-724【第二篇文章】</option>



  <option value="735">|-725【忽悠到底】</option>



  <option value="736">|-726【孔大公子】</option>



  <option value="737">|-727【六亲不认】</option>



  <option value="738">|-728【叫人】</option>



  <option value="739">|-728【叫人】</option>



  <option value="740">|-729【借刀杀人】</option>



  <option value="741">|-730【辈分乱了】</option>



  <option value="742">|-731【下棋与支招】</option>



  <option value="743">|-732【请慢用】</option>



  <option value="744">|-733【交锋】</option>



  <option value="745">|-734【周先生请】</option>



  <option value="746">|-735【喝咖啡】</option>



  <option value="747">|-736【个个是人才】</option>



  <option value="748">|-737【津门大侠】</option>



  <option value="749">|-738【性别错乱者】</option>



  <option value="750">|-739【成交】</option>



  <option value="751">|-740【反应】</option>



  <option value="752">|-741【泰迪周】</option>



  <option value="753">|-742【舞会】</option>



  <option value="754">|-743【苜蓿园】</option>



  <option value="755">|-744【江边的新家】</option>



  <option value="756">|-745【周大头】</option>



  <option value="757">|-746【访客盈门】</option>



  <option value="758">|-747【周议长】</option>



  <option value="759">|-748【基建狂魔】</option>



  <option value="760">|-749【灵均拜师】</option>



  <option value="761">|-750【打飞机看奥运】</option>



  <option value="762">|-751【国术惊艳全场】</option>



  <option value="763">|-752【满地黑哨】</option>



  <option value="764">|-753【申诉】</option>



  <option value="765">|-754【文章】</option>



  <option value="766">|-755【天下乌鸦一般黑】</option>



  <option value="767">|-756【胜利曙光】</option>



  <option value="768">|-757【追赶】</option>



  <option value="769">|-758【元首的晚餐】</option>



  <option value="770">|-759【刷奖牌】</option>



  <option value="771">|-760【背水一战】</option>



  <option value="772">|-761【魂】</option>



  <option value="773">|-762【载誉而归】</option>



  <option value="774">|-763【我的民族】</option>



  <option value="775">|-764【夹道欢迎】</option>



  <option value="776">|-765【中国人也是能够的】</option>



  <option value="777">|-766【祈雨】</option>



  <option value="778">|-767【天府之国】</option>



  <option value="779">|-768【助人助己】</option>



  <option value="780">|-769【比想象中严重】</option>



  <option value="781">|-770【抢粮】</option>



  <option value="782">|-771【霜刃未曾试】</option>



  <option value="783">|-772【打啵Kill】</option>



  <option value="784">|-773【大事化小】</option>



  <option value="785">|-774【周神仙的传说】</option>



  <option value="786">|-775【为富不仁的重庆首富】</option>



  <option value="787">|-776【真正的土豪】</option>



  <option value="788">|-777【大资本家】</option>



  <option value="789">|-第779章 778【吃人】</option>



  <option value="790">|-第780章 779【人祸】</option>



  <option value="791">|-第781章 780【狼狈为奸】</option>



  <option value="792">|-781【末世劫】</option>



  <option value="793">|-782【妖道必须死】</option>



  <option value="794">|-783【杀人还要诛心】</option>



  <option value="795">|-784【退货！】</option>



  <option value="796">|-785【走为上】</option>



  <option value="797">|-786【膝盖中箭的汤半城】</option>



  <option value="798">|-787【自投罗网】</option>



  <option value="799">|-788【快意恩仇的袍哥被堵在人堆里画风突变】</option>



  <option value="800">|-789【公审】</option>



  <option value="801">|-790【扒皮食肉】</option>



  <option value="802">|-791【夔门】</option>



  <option value="803">|-792【同监来访】</option>



  <option value="804">|-793【做客】</option>



  <option value="805">|-794【袍哥救国会】</option>



  <option value="806">|-795【商业计划】</option>



  <option value="807">|-796【拜码头】</option>



  <option value="808">|-797【刘湘来访】</option>



  <option value="809">|-798【副使】</option>



  <option value="810">|-799【战争预警】</option>



  <option value="811">|-800【黑龙会】</option>



  <option value="812">|-801【主场】</option>



  <option value="813">|-802【更改计划】</option>



  <option value="814">|-803【山西老财】</option>



  <option value="815">|-804【咳咳咳】</option>



  <option value="816">|-805【委员长的愤怒】</option>



  <option value="817">|-806【后话】</option>



  <option value="818">|-807【途中】</option>



  <option value="819">|-808【墨索里尼与生大蒜】</option>



  <option value="820">|-809【诗歌朗诵】</option>



  <option value="821">|-810【易经】</option>



  <option value="822">|-811【太极图】</option>



  <option value="823">|-812【人类社会太极八卦系统】</option>



  <option value="824">|-813【英王加冕】</option>



  <option value="825">|-814【偷酒喝的公主】</option>



  <option value="826">|-815【七月】</option>



  <option value="827">|-816【诗会】</option>



  <option value="828">|-817【刘彻】</option>



  <option value="829">|-818【春望】</option>



  <option value="830">|-819【七七事变】</option>



  <option value="831">|-820【英雄叱咤，壮士骁骁】</option>



  <option value="832">|-821【民族进化论】</option>



  <option value="833">|-822【起来，不愿做奴隶的人们】</option>



  <option value="834">|-823【周赫煊能做的】</option>



  <option value="835">|-824【八月】</option>



  <option value="836">|-825【安排】</option>



  <option value="837">|-826【死字旗】</option>



  <option value="838">|-827【与子同袍】</option>



  <option value="839">|-828【内情】</option>



  <option value="840">|-829【人才】</option>



  <option value="841">|-830【故人】</option>



  <option value="842">|-831【药厂】</option>



  <option value="843">|-832【钓鱼城】</option>



  <option value="844">|-833【鸡犬不留】</option>



  <option value="845">|-834【否极泰来】</option>



  <option value="846">|-835【受聘】</option>



  <option value="847">|-836【政府内迁和美国人民抵制日货】</option>



  <option value="848">|-837【任教】</option>



  <option value="849">|-838【史观】</option>



  <option value="850">|-839【信心】</option>



  <option value="851">|-840【美援派】</option>



  <option value="852">|-841【空壳元首】</option>



  <option value="853">|-842【刘湘之死】</option>



  <option value="854">|-843【第一次轰炸重庆】</option>



  <option value="855">|-844【空战】</option>



  <option value="856">|-845【统一战线模范省】</option>



  <option value="857">|-846【老骥伏枥】</option>



  <option value="858">|-847【话不投机】</option>



  <option value="859">|-848【贸易和战争】</option>



  <option value="860">|-849【给老蒋提条件】</option>



  <option value="861">|-850【可爱的美国人民】</option>



  <option value="862">|-851【国际友人】</option>



  <option value="863">|-852【揭露者】</option>



  <option value="864">|-853【拉贝日记】</option>



  <option value="865">|-854【整理资料】</option>



  <option value="866">|-855【无意间做出的漂亮决定】</option>



  <option value="867">|-856【文人】</option>



  <option value="868">|-857【八女投江】</option>



  <option value="869">|-858【火星入侵】</option>



  <option value="870">|-859【水晶之夜】</option>



  <option value="871">|-860【犹太人的历史】</option>



  <option value="872">|-861【美国士族】</option>



  <option value="873">|-862【和平呼吁】</option>



  <option value="874">|-863【中国人和犹太人的交易】</option>



  <option value="875">|-864【招待宴】</option>



  <option value="876">|-865【一个大汉奸的诞生】</option>



  <option value="877">|-866【圣诞节】</option>



  <option value="878">|-867【放映】</option>



  <option value="879">|-868【反应】</option>



  <option value="880">|-869【攻占美国】</option>



  <option value="881">|-870【废除排华法案】</option>



  <option value="882">|-871【PTT会员】</option>



  <option value="883">|-872【心灵鸡汤之父】</option>



  <option value="884">|-873【成功的秘诀】</option>



  <option value="885">|-874【成功学宗师王阳明】</option>



  <option value="886">|-875【回渝】</option>



  <option value="887">|-876【华侨之鹰】</option>



  <option value="888">|-877【双枪老太婆】</option>



  <option value="889">|-878【又喜又忧的周至柔】</option>



  <option value="890">|-879【周委员长】</option>



  <option value="891">|-880【空军大捷】</option>



  <option value="892">|-881【阳明洞】</option>



  <option value="893">|-882【西南联大】</option>



  <option value="894">|-883【入土为安】</option>



  <option value="895">|-884【品烟如品人】</option>



  <option value="896">|-885【闻一多VS刘文典——真人PK】</option>



  <option value="897">|-886【闲扯】</option>



  <option value="898">|-887【养鸡秘笈】</option>



  <option value="899">|-888【吃肉】</option>



  <option value="900">|-889【回忆】</option>



  <option value="901">|-890【宿舍夜谈】</option>



  <option value="902">|-889【回忆】</option>



  <option value="903">|-890【宿舍夜谈】</option>



  <option value="904">|-891【离开】</option>



  <option value="905">|-892【两个逗比】</option>



  <option value="906">|-893【瞎子】</option>



  <option value="907">|-894【维烈——挂科一半的天才儿童】</option>



  <option value="908">|-895【周明诚的缺点】</option>



  <option value="909">|-896【恼羞成怒】</option>



  <option value="910">|-897【七月】</option>


  </select> -- </dd><dd>移动到：<select size="1" name="toid" id="toid">
  <option value="0">--最前面--</option>


  <option value="1">|-001【初到津门】</option>



  <option value="2">|-002【租房落脚】</option>



  <option value="3">|-003【仙侠宗师】</option>



  <option value="4">|-004【射雕英雄传】</option>



  <option value="5">|-005【千字一元】</option>



  <option value="6">|-006【穿越者的茫然】</option>



  <option value="7">|-007【变天】</option>



  <option value="8">|-008【民国第一诗人】</option>



  <option value="9">|-009【大帅有请】</option>



  <option value="10">|-010【惑乱军心】</option>



  <option value="11">|-011【装逼过头】</option>



  <option value="12">|-012【拆皇帝家大门】</option>



  <option value="13">|-013【惊天秘计】</option>



  <option value="14">|-014【一个妈生的】</option>



  <option value="15">|-015【屠刀】</option>



  <option value="16">|-016【大婚】</option>



  <option value="17">|-017【法国领事夫人】</option>



  <option value="18">|-018【沙龙赴约】</option>



  <option value="19">|-019【开讲】</option>



  <option value="20">|-020【是时候展现真正的技术了】</option>



  <option value="21">|-021【大贤遗野】</option>



  <option value="22">|-022【乐不思蜀】</option>



  <option value="23">|-023【策问】</option>



  <option value="24">|-024【段公子】</option>



  <option value="25">|-025【各有所忧】</option>



  <option value="26">|-026【天下大势】</option>



  <option value="27">|-027【撩】</option>



  <option value="28">|-028【忧喜自得】</option>



  <option value="29">|-029【三成版税】</option>



  <option value="30">|-030【摩登伽女】</option>



  <option value="31">|-031【冬皇】</option>



  <option value="32">|-032【二等二级中校副官周赫煊是也】</option>



  <option value="33">|-033【恶人自有恶人磨】</option>



  <option value="34">|-034【武当剑仙】</option>



  <option value="35">|-035【发酵】</option>



  <option value="36">|-036【周赫煊吾师也】</option>



  <option value="37">|-037【上门讨教】</option>



  <option value="38">|-038【少帅】</option>



  <option value="39">|-039【调职】</option>



  <option value="40">|-040【神魔乱舞的大帅府】</option>



  <option value="41">|-041【利益使然】</option>



  <option value="42">|-042【养望】（为盟主烹鲤鱼加更）</option>



  <option value="43">|-043【戒大烟】</option>



  <option value="44">|-044【不党、不私、不卖、不盲】</option>



  <option value="45">|-045【奉系清流】</option>



  <option value="46">|-046【爱国教育】</option>



  <option value="47">|-047【刀妃革命】</option>



  <option value="48">|-048【新的计划】</option>



  <option value="49">|-049【乔迁新居】</option>



  <option value="50">|-050【忽悠捐款】</option>



  <option value="51">|-051【断发明志】</option>



  <option value="52">|-052【响应】</option>



  <option value="53">|-053【志摩】</option>



  <option value="54">|-054【诗人周赫煊】</option>



  <option value="55">|-055【少女情怀总是诗】</option>



  <option value="56">|-056【接连登门】</option>



  <option value="57">|-057【进京】</option>



  <option value="58">|-058【传说中的周先生】</option>



  <option value="59">|-059【我有一个梦想】</option>



  <option value="60">|-060【抵达清华】</option>



  <option value="61">|-061【诚则明也】</option>



  <option value="62">|-062【人情最大】</option>



  <option value="63">|-063【名传四方】</option>



  <option value="64">|-064【雅事】</option>



  <option value="65">|-065【再见】</option>



  <option value="66">|-066【褚二爷】</option>



  <option value="67">|-067【比谁拳头大】</option>



  <option value="68">|-068【杀心起】</option>



  <option value="69">|-069【希望小学】</option>



  <option value="70">|-070【惨案】</option>



  <option value="71">|-071【狗血】</option>



  <option value="72">|-072【讲故事】</option>



  <option value="73">|-073【又见情诗】</option>



  <option value="74">|-074【差事】</option>



  <option value="75">|-075【侯七VS马六】</option>



  <option value="76">|-076【卸磨杀驴VS兔子咬人】</option>



  <option value="77">|-077【避难】</option>



  <option value="78">|-078【蠢得像头猪】</option>



  <option value="79">|-079【灭口】</option>



  <option value="80">|-080【了结】</option>



  <option value="81">|-081【出气筒】</option>



  <option value="82">|-082【打一顿就好了】</option>



  <option value="83">|-083【火种】</option>



  <option value="84">|-084【神女】</option>



  <option value="85">|-085【魔幻现实主义】</option>



  <option value="86">|-086【空前绝后的证婚词】</option>



  <option value="87">|-087【卑鄙是卑鄙者的通行证】</option>



  <option value="88">|-088【爱国诗人】</option>



  <option value="89">|-089【清华讲课】</option>



  <option value="90">|-090【学霸太多】</option>



  <option value="91">|-091【活曹操】</option>



  <option value="92">|-092【又被坑了】</option>



  <option value="93">|-093【当官了】</option>



  <option value="94">|-094【小钱钱】</option>



  <option value="95">|-095【小说还能这样写？】</option>



  <option value="96">|-096【北大复课】</option>



  <option value="97">|-097【忽悠】</option>



  <option value="98">|-098【忍辱负重】</option>



  <option value="99">|-099【谈文学创作】</option>



  <option value="100">|-100【副刊就绪】</option>



  <option value="101">|-101【郑证因】</option>



  <option value="102">|-102【又一个入伙的】</option>



  <option value="103">|-103【丈母娘看女婿】</option>



  <option value="104">|-104【少帅的忧心】</option>



  <option value="105">|-105【被人求字】</option>



  <option value="106">|-106【去东北】</option>



  <option value="107">|-107【一把火】</option>



  <option value="108">|-108【追更】</option>



  <option value="109">|-109【砸玻璃】</option>



  <option value="110">|-110【万寿】</option>



  <option value="111">|-111【死心】</option>



  <option value="112">|-112【和平分手】</option>



  <option value="113">|-113【画画】</option>



  <option value="114">|-114【厮磨】</option>



  <option value="115">|-115【妇女解放】</option>



  <option value="116">|-116【样品】</option>



  <option value="117">|-117【轻啄】</option>



  <option value="118">|-118【抵沪】</option>



  <option value="119">|-119【舞厅】</option>



  <option value="120">|-120【毛妹】</option>



  <option value="121">|-121【合作】</option>



  <option value="122">|-122【购画】</option>



  <option value="123">|-123【国际友人】</option>



  <option value="124">|-124【农村大地】</option>



  <option value="125">|-125【建厂】</option>



  <option value="126">|-126【剪发潮】</option>



  <option value="127">|-127【搞个大新闻】</option>



  <option value="128">|-128【文妖周赫煊】</option>



  <option value="129">|-129【狂士】</option>



  <option value="130">|-130【热卖】</option>



  <option value="131">|-131【女校演讲】</option>



  <option value="132">|-132【妇女之友】</option>



  <option value="133">|-133【难民】</option>



  <option value="134">|-134【袁公子】</option>



  <option value="135">|-135【荒唐名士】</option>



  <option value="136">|-136【青帮百相】</option>



  <option value="137">|-137【青红】</option>



  <option value="138">|-138【豪杰】</option>



  <option value="139">|-139【以工代赈】</option>



  <option value="140">|-140【义演】</option>



  <option value="141">|-141【夜袭】</option>



  <option value="142">|-142【虚伪】</option>



  <option value="143">|-143【三毛连载】</option>



  <option value="144">|-144【翘家千金】</option>



  <option value="145">|-145【吃人】</option>



  <option value="146">|-146【泛淤】</option>



  <option value="147">|-147【说服】</option>



  <option value="148">|-148【坦白】</option>



  <option value="149">|-149【我是他未婚妻】</option>



  <option value="150">|-150【问答】</option>



  <option value="151">|-151【借钱】</option>



  <option value="152">|-152【狗官】</option>



  <option value="153">|-153【学生们最痛恨的作家】</option>



  <option value="154">|-154【还珠楼主的处女作】</option>



  <option value="155">|-155【画家和文物贩子】</option>



  <option value="156">|-156【金石其心，芝兰其室】</option>



  <option value="157">|-157【去他妈的张宗昌】</option>



  <option value="158">|-158【冯庸大学】</option>



  <option value="159">|-159【军事化办学】</option>



  <option value="160">|-160【田中奏折】</option>



  <option value="161">|-161【作大死】</option>



  <option value="162">|-162【神秘少女】</option>



  <option value="163">|-163【偶遇】</option>



  <option value="164">|-164【千里示警】</option>



  <option value="165">|-165【应对之计】</option>



  <option value="166">|-166【讨薪】</option>



  <option value="167">|-167【赚钱方案】</option>



  <option value="168">|-168【编教材】</option>



  <option value="169">|-169【古怪的老头儿】</option>



  <option value="170">|-170【明白人】</option>



  <option value="171">|-171【人类学著作】</option>



  <option value="172">|-172【美国出版商】</option>



  <option value="173">|-173【褚二爷的新猎物】</option>



  <option value="174">|-174【菊花般的爱情】</option>



  <option value="175">|-175【接头见面】</option>



  <option value="176">|-176【一条好狗】</option>



  <option value="177">|-177【玄洋社】</option>



  <option value="178">|-178【开业酒会】</option>



  <option value="179">|-179【英雄救美】</option>



  <option value="180">|-180【留在身边】（为盟主“老王短又小”加更）</option>



  <option value="181">|-181【美国推销员】</option>



  <option value="182">|-182【推荐你一本好书】</option>



  <option value="183">|-182【精英青睐】</option>



  <option value="184">|-184【征辟】（为盟主“ 狎鸥亭刘赫”加更）</option>



  <option value="185">|-185【非主流美国将军】</option>



  <option value="186">|-186【黑色幽默】</option>



  <option value="187">|-187【万民伞】</option>



  <option value="188">|-188【法国采访】（为盟主“老王真的短又小”加更）</option>



  <option value="189">|-189【告别】</option>



  <option value="190">|-190【广播电台】</option>



  <option value="191">|-191【美国商人】</option>



  <option value="192">|-192【新书】（为盟主“乡村鼓楼”加更）</option>



  <option value="193">|-193【吸引火力】</option>



  <option value="194">|-194【南开】</option>



  <option value="195">|-195【文明】</option>



  <option value="196">|-196【人类历史学】</option>



  <option value="197">|-197【电台开播】</option>



  <option value="198">|-198【不识抬举】</option>



  <option value="199">|-199【息事宁人】</option>



  <option value="200">|-200【访谈节目】</option>



  <option value="201">|-201【电声杂文】</option>



  <option value="202">|-202【迫不及待】</option>



  <option value="203">|-203【私语】</option>



  <option value="204">|-204【惨案】</option>



  <option value="205">|-205【退股】（为盟主“丁博约”加更）</option>



  <option value="206">|-206【菊与刀】（为盟主“落幕_悲伤”加更）</option>



  <option value="207">|-207【赴鲁赈灾】</option>



  <option value="208">|-208【哈雷特·阿班】</option>



  <option value="209">|-209【歪曲报道】</option>



  <option value="210">|-210【红粮问题】</option>



  <option value="211">|-201【军师】</option>



  <option value="212">|-202【乌合之众】</option>



  <option value="213">|-203【熟人】 （为盟主“Seven丶小七”加更）</option>



  <option value="214">|-214【押解】</option>



  <option value="215">|-215【周先生，咱拜把子吧】</option>



  <option value="216">|-216【借兵】</option>



  <option value="217">|-217【各种骂娘】</option>



  <option value="218">|-218【出逃乱象】</option>



  <option value="219">|-219【除害】</option>



  <option value="220">|-220【故事】</option>



  <option value="221">|-221【买房】</option>



  <option value="222">|-222【变天】</option>



  <option value="223">|-223【美国脑残粉】</option>



  <option value="224">|-224【校长】</option>



  <option value="225">|-225【三乐堂】</option>



  <option value="226">|-226【说客】（为盟主“老王真的真的短又小”加更）</option>



  <option value="227">|-227【内外妥协】</option>



  <option value="228">|-228【铁杆书迷】</option>



  <option value="229">|-229【南戴北周】</option>



  <option value="230">|-230【新合伙人】</option>



  <option value="231">|-231【喜】</option>



  <option value="232">|-232【仙侠小说】</option>



  <option value="233">|-233【将军，给钱吧】</option>



  <option value="234">|-224【再到上海】</option>



  <option value="235">|-235【坐谈】</option>



  <option value="236">|-236【党即是法】</option>



  <option value="237">|-237【交锋】</option>



  <option value="238">|-238【大水冲了龙王庙】</option>



  <option value="239">|-239【可悲】</option>



  <option value="240">|-240【教育部现状】</option>



  <option value="241">|-241【理想与现实】（求月票）</option>



  <option value="242">|-242【扯着蛋】</option>



  <option value="243">|-243【私心】</option>



  <option value="244">|-244【厚黑教主】</option>



  <option value="245">|-245【封你做副教主】（为盟主“往事成烟”加更）</option>



  <option value="246">|-246【机器和人力的比赛】</option>



  <option value="247">|-247【推广】</option>



  <option value="248">|-248【情敌】</option>



  <option value="249">|-249【上门】</option>



  <option value="250">|-250【讨好丈母娘】</option>



  <option value="251">|-251【悬乎】</option>



  <option value="252">|-252【请媒人】</option>



  <option value="253">|-253【借势】</option>



  <option value="254">|-254【订婚】</option>



  <option value="255">|-255【迎回周校长】</option>



  <option value="256">|-256【狗皮膏药校长】</option>



  <option value="257">|-257【又要抄书了】</option>



  <option value="258">|-258【非主流课程】</option>



  <option value="259">|-259【恼骚】</option>



  <option value="260">|-260【摸金校尉孙老殿】</option>



  <option value="261">|-261【亡国之君难当】</option>



  <option value="262">|-262【科幻小说】</option>



  <option value="263">|-263【北大校花】</option>



  <option value="264">|-264【文学少女】</option>



  <option value="265">|-265【舆论攻势】</option>



  <option value="266">|-266【天真】</option>



  <option value="267">|-267【计策】</option>



  <option value="268">|-268【阎老西】</option>



  <option value="269">|-269【算账】</option>



  <option value="270">|-270【麻烦真多】</option>



  <option value="271">|-271【川越】</option>



  <option value="272">|-272【考古】</option>



  <option value="273">|-273【坏人才能当军阀】</option>



  <option value="274">|-274【汤因比】</option>



  <option value="275">|-275【会面】</option>



  <option value="276">|-276【论宗教】</option>



  <option value="277">|-277【预言者】</option>



  <option value="278">|-278【婚期将近】</option>



  <option value="279">|-279【震惊：女婿要上天！】</option>



  <option value="280">|-280【爱面子的阎部长】</option>



  <option value="281">|-281【开飞机贺喜】</option>



  <option value="282">|-282【吃亏】</option>



  <option value="283">|-283【断章】</option>



  <option value="284">|-284【年鉴学派创始人】</option>



  <option value="285">|-285【小路易】</option>



  <option value="286">|-286【奇葩作家】</option>



  <option value="287">|-287【声名鹊起】</option>



  <option value="288">|-288【诺贝尔候选人】</option>



  <option value="289">|-289【急电】</option>



  <option value="290">|-290【一个时代结束】</option>



  <option value="291">|-291【查贪】</option>



  <option value="292">|-292【一锅端】</option>



  <option value="293">|-293【捐赠】</option>



  <option value="294">|-294【废除中医】</option>



  <option value="295">|-295【论战】</option>



  <option value="296">|-296【薛疯子】</option>



  <option value="297">|-297【论传统武术】</option>



  <option value="298">|-298【剑掌无双周赫煊】</option>



  <option value="299">|-299【战火再起】</option>



  <option value="300">|-300【思想】</option>



  <option value="301">|-301【采访】</option>



  <option value="302">|-302【丑儿】</option>



  <option value="303">|-303【偶遇】</option>



  <option value="304">|-304【豆汁儿】</option>



  <option value="305">|-305【灵均】</option>



  <option value="306">|-306【无休无止的学潮】</option>



  <option value="307">|-307【乔帮主】</option>



  <option value="308">|-308【热爱炒股的间谍先生】</option>



  <option value="309">|-309【三只狐狸】</option>



  <option value="310">|-310【中东路】</option>



  <option value="311">|-311【步步错】</option>



  <option value="312">|-312【科幻小说】</option>



  <option value="313">|-313【抵美】</option>



  <option value="314">|-314【洪门】</option>



  <option value="315">|-315【完美演出】</option>



  <option value="316">|-316【股神】</option>



  <option value="317">|-317【心惊胆战】</option>



  <option value="318">|-318【自杀潮】</option>



  <option value="319">|-319【好生意】</option>



  <option value="320">|-320【五洲洪门】</option>



  <option value="321">|-321【新服】</option>



  <option value="322">|-322【仪式】</option>



  <option value="323">|-322【罗斯福】</option>



  <option value="324">|-324【隆中对】</option>



  <option value="325">|-325【哥大邀请】</option>



  <option value="326">|-326【战争与和平】</option>



  <option value="327">|-327【导师】</option>



  <option value="328">|-328【中国文坛第一人】</option>



  <option value="329">|-329【巴黎】</option>



  <option value="330">|-330【华工】</option>



  <option value="331">|-331【纪念】</option>



  <option value="332">|-332【另类领奖】</option>



  <option value="333">|-333【风起】</option>



  <option value="334">|-334【副馆长和设计师】</option>



  <option value="335">|-335【考察】</option>



  <option value="336">|-336【蒋作宾】</option>



  <option value="337">|-337【周赫煊的猫】</option>



  <option value="338">|-338【邀请】</option>



  <option value="339">|-339【全民热议】</option>



  <option value="340">|-340【莫斯科】</option>



  <option value="341">|-341【强势】</option>



  <option value="342">|-342【表情包】</option>



  <option value="343">|-343【再会】</option>



  <option value="344">|-344【死局】</option>



  <option value="345">|-345【心腹】</option>



  <option value="346">|-346【政坛搅屎棍】</option>



  <option value="347">|-347【瑰宝】</option>



  <option value="348">|-348【书生】</option>



  <option value="349">|-349【留学基金】</option>



  <option value="350">|-350【回家】</option>



  <option value="351">|-351【崔家姐妹】</option>



  <option value="352">|-352【才女】</option>



  <option value="353">|-353【拐带良家妇女】</option>



  <option value="354">|-354【土豪】</option>



  <option value="355">|-355【买卖】</option>



  <option value="356">|-356【维烈】</option>



  <option value="357">|-357【剧场版大船】</option>



  <option value="358">|-358【疯狂】</option>



  <option value="359">|-359【空缺的普利策历史奖】</option>



  <option value="360">|-360【钱钟书和钱穆】</option>



  <option value="361">|-361【完颜立童记】</option>



  <option value="362">|-362【我爱这土地】</option>



  <option value="363">|-263【鲁梁骂战】</option>



  <option value="364">|-264【一猜就中】</option>



  <option value="365">|-265【巴金】</option>



  <option value="366">|-366【战争与贫困】</option>



  <option value="367">|-367【香山旅游团】</option>



  <option value="368">|-368【写诗】</option>



  <option value="369">|-369【诗与情】</option>



  <option value="370">|-370【可知少女心事？】</option>



  <option value="371">|-371【缘分】</option>



  <option value="372">|-372【留学生】</option>



  <option value="373">|-373【批发字画】</option>



  <option value="374">|-374【名人字画收割者】</option>



  <option value="375">|-375【电影公司】</option>



  <option value="376">|-376【大坑货】</option>



  <option value="377">|-377【红颜薄命】</option>



  <option value="378">|-378【都不靠谱】</option>



  <option value="379">|-379【一场烂仗】</option>



  <option value="380">|-380【好人，坏人】</option>



  <option value="381">|-381【青帮三大佬】</option>



  <option value="382">|-382【脑子是个好东西】</option>



  <option value="383">|-383【做事漂亮】</option>



  <option value="384">|-383【法国总领事也是书迷】</option>



  <option value="385">|-385【文艺沙龙】</option>



  <option value="386">|-386【私卖烟土】</option>



  <option value="387">|-387【周先生要出手】</option>



  <option value="388">|-388【阿门】</option>



  <option value="389">|-389【坐地起价】</option>



  <option value="390">|-390【拖延麻痹】</option>



  <option value="391">|-391【铁口铜牙】（为盟主“允儿骑士”加更）</option>



  <option value="392">|-387【奉军入关】</option>



  <option value="393">|-388【战事尾声】</option>



  <option value="394">|-389【贪官污吏】</option>



  <option value="395">|-390【北方教育界的破事】</option>



  <option value="396">|-391【又一个四小姐】</option>



  <option value="397">|-392【有声电影】</option>



  <option value="398">|-393【第一个现代汉语拼音学习者】</option>



  <option value="399">|-394【影坛一姐】</option>



  <option value="400">|-395【麻将·市井】</option>



  <option value="401">|-396【中国报业协会】</option>



  <option value="402">|-397【职业操守】</option>



  <option value="403">|-398【萧三爷】</option>



  <option value="404">|-399【水落石出】</option>



  <option value="405">|-400【汉语和汉字】</option>



  <option value="406">|-401【教科书】</option>



  <option value="407">|-402【重新定义世界史】</option>



  <option value="408">|-403【中央大学也缺钱】</option>



  <option value="409">|-404【一次预言，一场演讲】</option>



  <option value="410">|-405【归化派翻译家】</option>



  <option value="411">|-406【老徐的烦恼】</option>



  <option value="412">|-407【宁粤之争】</option>



  <option value="413">|-408【张家老二】</option>



  <option value="414">|-409【惊天秘闻】</option>



  <option value="415">|-410【共济会】</option>



  <option value="416">|-411【搪瓷流水线】</option>



  <option value="417">|-412【建厂计划】</option>



  <option value="418">|-413【新出炉的教科书】</option>



  <option value="419">|-414【海军与胖子】</option>



  <option value="420">|-415【范哈儿】</option>



  <option value="421">|-416【巴蜀王】</option>



  <option value="422">|-417【刘神仙】（为盟主“无聊的倒霉熊”加更）</option>



  <option value="423">|-418【玩命的演习】</option>



  <option value="424">|-419【科普】</option>



  <option value="425">|-420【斗法】</option>



  <option value="426">|-421【东华帝君】</option>



  <option value="427">|-422【神仙打架】</option>



  <option value="428">|-423【收徒】</option>



  <option value="429">|-424【同道中人】</option>



  <option value="430">|-425【前往重大】</option>



  <option value="431">|-426【宣传】</option>



  <option value="432">|-427【工科】</option>



  <option value="433">|-428【庐山别墅】</option>



  <option value="434">|-429【名人拜访】</option>



  <option value="435">|-430【太太家的客厅】</option>



  <option value="436">|-431【中国工人】</option>



  <option value="437">|-432【国事】</option>



  <option value="438">|-433【呜呼哀哉】</option>



  <option value="439">|-434【及时雨】</option>



  <option value="440">|-435【危局】</option>



  <option value="441">|-436【老毛病】</option>



  <option value="442">|-437【劝谏】</option>



  <option value="443">|-438【再劝】</option>



  <option value="444">|-439【国耻】</option>



  <option value="445">|-440【进退】</option>



  <option value="446">|-441【七人背】</option>



  <option value="447">|-442【东北民众抗日救国会】</option>



  <option value="448">|-443【看破红尘的张二公子】</option>



  <option value="449">|-444【川岛芳子的任务】</option>



  <option value="450">|-445【遇到同行】</option>



  <option value="451">|-446【见血】</option>



  <option value="452">|-447【内斗】</option>



  <option value="453">|-448【义勇军出征】</option>



  <option value="454">|-449【饭桶胡适先生的努力】</option>



  <option value="455">|-450【文章】</option>



  <option value="456">|-451【闲谈】</option>



  <option value="457">|-452【拖死日本才是正途】</option>



  <option value="458">|-453【剖腹明志第一人】</option>



  <option value="459">|-454【一点小礼物】</option>



  <option value="460">|-455【好消息】</option>



  <option value="461">|-456【默契】</option>



  <option value="462">|-457【窝囊废市长】</option>



  <option value="463">|-458【谈不拢啊】</option>



  <option value="464">|-459【回应】</option>



  <option value="465">|-460【扒电车公司的黑底】</option>



  <option value="466">|-461【大地头蛇】</option>



  <option value="467">|-462【无计可施】</option>



  <option value="468">|-463【国难？】</option>



  <option value="469">|-464【签名游戏】</option>



  <option value="470">|-465【扯淡会议】</option>



  <option value="471">|-466【周先生发言】</option>



  <option value="472">|-467【青年党】</option>



  <option value="473">|-468【孙子】</option>



  <option value="474">|-469【屁股歪了，脑袋也不好使】</option>



  <option value="475">|-470【论佛】</option>



  <option value="476">|-471【小白鼠】</option>



  <option value="477">|-472【修身、治国和心理学】</option>



  <option value="478">|-473【欲望、理智和道德】</option>



  <option value="479">|-474【非战会议】</option>



  <option value="480">|-475【国际反法斯西同盟】</option>



  <option value="481">|-476【讨论】</option>



  <option value="482">|-477【工党领袖】</option>



  <option value="483">|-478【伦敦政经学院】</option>



  <option value="484">|-479【日落西山】</option>



  <option value="485">|-480【薇薇安】</option>



  <option value="486">|-481【妖魔鬼怪】</option>



  <option value="487">|-482【王子的邀请】</option>



  <option value="488">|-482【王子的邀请】</option>



  <option value="489">|-483【轰动】</option>



  <option value="490">|-484【绝代佳人】</option>



  <option value="491">|-485【口口口口……吃】</option>



  <option value="492">|-486【贵族的遮羞布】</option>



  <option value="493">|-487【论喷子的历史素养】</option>



  <option value="494">|-488【犯贱】</option>



  <option value="495">|-489【大忽悠】</option>



  <option value="496">|-490【本能】</option>



  <option value="497">|-491【男人的占有欲】</option>



  <option value="498">|-492【周先生是语言学家】</option>



  <option value="499">|-493【伟大的段子手】</option>



  <option value="500">|-494【神药计划】</option>



  <option value="501">|-495【我心永恒】</option>



  <option value="502">|-496【实验成果】</option>



  <option value="503">|-497【买房才能申请专利】</option>



  <option value="504">|-498【支招】</option>



  <option value="505">|-499【发现】</option>



  <option value="506">|-500【艰难的选择】</option>



  <option value="507">|-501【丘吉尔】</option>



  <option value="508">|-502【丘胖子的知己】</option>



  <option value="509">|-503【追更的丘吉尔】</option>



  <option value="510">|-504【返航】</option>



  <option value="511">|-505【虚伪的老头儿】</option>



  <option value="512">|-506【驳斥】</option>



  <option value="513">|-507【中国也有大师】</option>



  <option value="514">|-508【论文明与法】</option>



  <option value="515">|-509【服软】</option>



  <option value="516">|-510【策问】</option>



  <option value="517">|-511【黄老之术】</option>



  <option value="518">|-512【逐本求末】</option>



  <option value="519">|-513【神女上映】</option>



  <option value="520">|-514【看电影】</option>



  <option value="521">|-515【中国电影二三事】</option>



  <option value="522">|-516【威尔斯与银英传】</option>



  <option value="523">|-517【我们的征途是星辰大海】</option>



  <option value="524">|-518【严峻的问题】</option>



  <option value="525">|-519【女管家】</option>



  <option value="526">|-520【各有所思】</option>



  <option value="527">|-521【小胖墩儿】</option>



  <option value="528">|-522【小狐狸与玫瑰花】</option>



  <option value="529">|-523【串联】</option>



  <option value="530">|-524【新年的梦想】</option>



  <option value="531">|-525【长城抗战】</option>



  <option value="532">|-526【文物南迁】</option>



  <option value="533">|-527【北平分会成立】</option>



  <option value="534">|-528【陆军监狱】</option>



  <option value="535">|-529【少帅下野】</option>



  <option value="536">|-530【叛徒，也是烈士】</option>



  <option value="537">|-531【阵痛】</option>



  <option value="538">|-532【罗斯福的圈套】</option>



  <option value="539">|-530【敌后抗战】</option>



  <option value="540">|-531【松花江上】</option>



  <option value="541">|-532【二十九军】</option>



  <option value="542">|-533【背锅小王子】</option>



  <option value="543">|-534【收徒弟】</option>



  <option value="544">|-535【准备写小说】</option>



  <option value="545">|-536【东北史诗】</option>



  <option value="546">|-537【罗素伯爵】</option>



  <option value="547">|-538【磺胺的威力】</option>



  <option value="548">|-539【忧患】</option>



  <option value="549">|-540【非攻】</option>



  <option value="550">|-541【黑土】</option>



  <option value="551">|-542【应聘】</option>



  <option value="552">|-543【成功与麻烦】</option>



  <option value="553">|-544【喂狗】</option>



  <option value="554">|-545【乌烟瘴气】</option>



  <option value="555">|-546【又是地下党】</option>



  <option value="556">|-547【全运会】</option>



  <option value="557">|-548【悲哀的体育事业】</option>



  <option value="558">|-549【南国美人鱼】</option>



  <option value="559">|-550【砸了好多钱】</option>



  <option value="560">|-551【体育报国】</option>



  <option value="561">|-552【商业运作】</option>



  <option value="562">|-553【丢人现眼】</option>



  <option value="563">|-554【十四万人齐解甲，更无一个是男儿】</option>



  <option value="564">|-555【出名的费小姐】</option>



  <option value="565">|-556【小人暗算】</option>



  <option value="566">|-557【不要跟哲学家聊天】</option>



  <option value="567">|-558【京派海派】</option>



  <option value="568">|-559【费正清】</option>



  <option value="569">|-560【回忆录】</option>



  <option value="570">|-561【元宵节与新生活】</option>



  <option value="571">|-562【一场闹剧】</option>



  <option value="572">|-563【通风报信】</option>



  <option value="573">|-564【怕死和不怕死的】</option>



  <option value="574">|-565【逢场作戏】</option>



  <option value="575">|-566【新秘书上任】</option>



  <option value="576">|-567【忙碌的周先生】</option>



  <option value="577">|-568【评论文章】</option>



  <option value="578">|-569【抗战纲领】</option>



  <option value="579">|-570【南下】</option>



  <option value="580">|-571【凝聚】</option>



  <option value="581">|-572【毕业季】</option>



  <option value="582">|-573【留字】</option>



  <option value="583">|-574【鸿雁】</option>



  <option value="584">|-575【唱片公司】</option>



  <option value="585">|-576【音乐大才】</option>



  <option value="586">|-577【万里长城永不倒】</option>



  <option value="587">|-578【和尚也爱国】</option>



  <option value="588">|-579【太虚大和尚】</option>



  <option value="589">|-580【魔道】</option>



  <option value="590">|-581【妖僧】</option>



  <option value="591">|-582【难以解脱】</option>



  <option value="592">|-583【徐志摩失踪记】</option>



  <option value="593">|-584【找不见人】</option>



  <option value="594">|-585【全新版本】</option>



  <option value="595">|-586【电影皇帝和卖报歌】</option>



  <option value="596">|-587【阮玲玉的勇气】</option>



  <option value="597">|-588【一哭二闹三上吊】</option>



  <option value="598">|-589【封杀】</option>



  <option value="599">|-590【无锡】</option>



  <option value="600">|-591【遇事不决打麻将】</option>



  <option value="601">|-592【劳动最光荣】</option>



  <option value="602">|-593【死要面子】</option>



  <option value="603">|-594【蔫坏的老实人】</option>



  <option value="604">|-595【名人汇聚】</option>



  <option value="605">|-596【狂欢晚宴】</option>



  <option value="606">|-597【祥符文会之一】</option>



  <option value="607">|-598【祥符文会之二】</option>



  <option value="608">|-599【创作】</option>



  <option value="609">|-600【赞美】</option>



  <option value="610">|-601【现代派】</option>



  <option value="611">|-602【开山祖师】</option>



  <option value="612">|-603【内山书店】</option>



  <option value="613">|-604【禁歌】</option>



  <option value="614">|-605【斯诺采访】</option>



  <option value="615">|-606【承诺】</option>



  <option value="616">|-607【资本家的本性】</option>



  <option value="617">|-608【官司】</option>



  <option value="618">|-609【救人】</option>



  <option value="619">|-610【低调俱乐部】</option>



  <option value="620">|-611【发酵】</option>



  <option value="621">|-612【三阳线决战论】</option>



  <option value="622">|-613【人脉很重要】</option>



  <option value="623">|-614【远东检察官】</option>



  <option value="624">|-615【赌徒】</option>



  <option value="625">|-616【交易】</option>



  <option value="626">|-617【外交连环套】</option>



  <option value="627">|-618【变色龙】</option>



  <option value="628">|-619【论战再起】</option>



  <option value="629">|-620【家事与国事】</option>



  <option value="630">|-621【混血儿】</option>



  <option value="631">|-622【中美民间文化友好交流团】</option>



  <option value="632">|-623【失意的老宋】</option>



  <option value="633">|-624【抵达旧金山】</option>



  <option value="634">|-625【大中华戏院】</option>



  <option value="635">|-626【美好的明天】</option>



  <option value="636">|-627【唱双簧】</option>



  <option value="637">|-628【忽悠效果远超预期】</option>



  <option value="638">|-629【罗斯福的苦恼】</option>



  <option value="639">|-630【一锅粥】</option>



  <option value="640">|-631【弱国无外交】</option>



  <option value="641">|-632【阴险的瘸子】</option>



  <option value="642">|-633【改变计划】</option>



  <option value="643">|-634【真正的食腐秃鹫】</option>



  <option value="644">|-635【饕餮】</option>



  <option value="645">|-636【拜访王子】</option>



  <option value="646">|-637【巫师遇到巫师】</option>



  <option value="647">|-638【宝腾】</option>



  <option value="648">|-639【顺势而为】</option>



  <option value="649">|-640【贪婪的英国人】</option>



  <option value="650">|-641【大萧条下的好莱坞】</option>



  <option value="651">|-642【膨胀的电影皇帝】</option>



  <option value="652">|-643【小白脸上位】</option>



  <option value="653">|-644【入股】</option>



  <option value="654">|-645【满地捡钱】</option>



  <option value="655">|-646【赚钱与花钱】</option>



  <option value="656">|-647【私人飞行俱乐部】</option>



  <option value="657">|-648【P-26】</option>



  <option value="658">|-649【王安石与法西斯】</option>



  <option value="659">|-650【常凯申的四不精神】</option>



  <option value="660">|-651【长江大桥】</option>



  <option value="661">|-652【桥梁专家】</option>



  <option value="662">|-652【桥梁专家】</option>



  <option value="663">|-653【前往武昌】</option>



  <option value="664">|-654【负心汉】</option>



  <option value="665">|-655【法西斯就是抢劫犯】</option>



  <option value="666">|-656【我的祖国】</option>



  <option value="667">|-657【老蒋的参谋长】</option>



  <option value="668">|-658【恃才傲物】</option>



  <option value="669">|-659【捐飞机】</option>



  <option value="670">|-660【中国航空协会】</option>



  <option value="671">|-661【征招学员】</option>



  <option value="672">|-662【楼市崩盘】</option>



  <option value="673">|-663【上海首富】</option>



  <option value="674">|-664【交易】</option>



  <option value="675">|-665【荒诞世界】</option>



  <option value="676">|-666【妹妹】</option>



  <option value="677">|-667【拜访】</option>



  <option value="678">|-668【不是摹本，是祖本】</option>



  <option value="679">|-669【成舍我】</option>



  <option value="680">|-670【张恨水】</option>



  <option value="681">|-671【合作】</option>



  <option value="682">|-672【采玉章】</option>



  <option value="683">|-673【准备搬家】</option>



  <option value="684">|-674【国际宣传】</option>



  <option value="685">|-675【被歧视的美国佬】</option>



  <option value="686">|-676【万人迎接】</option>



  <option value="687">|-677【崇尚和平的英国】</option>



  <option value="688">|-678【好戏开始】</option>



  <option value="689">|-679【伟大的矮子民族】</option>



  <option value="690">|-680【幻灯片】</option>



  <option value="691">|-681【变态的民族】</option>



  <option value="692">|-682【追逐英雄】</option>



  <option value="693">|-683【刺杀】</option>



  <option value="694">|-684【混乱】</option>



  <option value="695">|-685【手术】</option>



  <option value="696">|-686【影响】</option>



  <option value="697">|-687【七轮决选】</option>



  <option value="698">|-688【欢庆】</option>



  <option value="699">|-689【推波助澜】</option>



  <option value="700">|-690【国际大学者周赫煊先生作品研究学习讨论会】</option>



  <option value="701">|-691【达成】</option>



  <option value="702">|-692【齐聚】</option>



  <option value="703">|-693【娱乐明星】</option>



  <option value="704">|-694【慈善家族】</option>



  <option value="705">|-695【文学界的独裁者】</option>



  <option value="706">|-696【领奖】</option>



  <option value="707">|-697【领奖致辞】</option>



  <option value="708">|-698【令人生厌的人与值得尊敬的人】</option>



  <option value="709">|-699【文物】</option>



  <option value="710">|-700【回程】</option>



  <option value="711">|-701【老丈人的要求】</option>



  <option value="712">|-702【元首的赞赏】</option>



  <option value="713">|-703【家中日常】</option>



  <option value="714">|-704【柏林】</option>



  <option value="715">|-705【元首亮相】</option>



  <option value="716">|-706【原来是小说迷】</option>



  <option value="717">|-707【先知周赫煊】</option>



  <option value="718">|-708【四大金刚】</option>



  <option value="719">|-709【中国运动员到来】</option>



  <option value="720">|-710【比划】</option>



  <option value="721">|-711【作弊方法】</option>



  <option value="722">|-712【中国的国球是足球？】</option>



  <option value="723">|-713【又是个特务头子】</option>



  <option value="724">|-714【又要发勋章】</option>



  <option value="725">|-715【家事】</option>



  <option value="726">|-716【争论】</option>



  <option value="727">|-717【杀了吧】</option>



  <option value="728">|-718【天狗吞日】</option>



  <option value="729">|-719【瞎子】</option>



  <option value="730">|-720【又是个鸦片鬼】</option>



  <option value="731">|-721【北边儿的委员长】</option>



  <option value="732">|-722【黑得丧心病狂】</option>



  <option value="733">|-723【挑动风云】</option>



  <option value="734">|-724【第二篇文章】</option>



  <option value="735">|-725【忽悠到底】</option>



  <option value="736">|-726【孔大公子】</option>



  <option value="737">|-727【六亲不认】</option>



  <option value="738">|-728【叫人】</option>



  <option value="739">|-728【叫人】</option>



  <option value="740">|-729【借刀杀人】</option>



  <option value="741">|-730【辈分乱了】</option>



  <option value="742">|-731【下棋与支招】</option>



  <option value="743">|-732【请慢用】</option>



  <option value="744">|-733【交锋】</option>



  <option value="745">|-734【周先生请】</option>



  <option value="746">|-735【喝咖啡】</option>



  <option value="747">|-736【个个是人才】</option>



  <option value="748">|-737【津门大侠】</option>



  <option value="749">|-738【性别错乱者】</option>



  <option value="750">|-739【成交】</option>



  <option value="751">|-740【反应】</option>



  <option value="752">|-741【泰迪周】</option>



  <option value="753">|-742【舞会】</option>



  <option value="754">|-743【苜蓿园】</option>



  <option value="755">|-744【江边的新家】</option>



  <option value="756">|-745【周大头】</option>



  <option value="757">|-746【访客盈门】</option>



  <option value="758">|-747【周议长】</option>



  <option value="759">|-748【基建狂魔】</option>



  <option value="760">|-749【灵均拜师】</option>



  <option value="761">|-750【打飞机看奥运】</option>



  <option value="762">|-751【国术惊艳全场】</option>



  <option value="763">|-752【满地黑哨】</option>



  <option value="764">|-753【申诉】</option>



  <option value="765">|-754【文章】</option>



  <option value="766">|-755【天下乌鸦一般黑】</option>



  <option value="767">|-756【胜利曙光】</option>



  <option value="768">|-757【追赶】</option>



  <option value="769">|-758【元首的晚餐】</option>



  <option value="770">|-759【刷奖牌】</option>



  <option value="771">|-760【背水一战】</option>



  <option value="772">|-761【魂】</option>



  <option value="773">|-762【载誉而归】</option>



  <option value="774">|-763【我的民族】</option>



  <option value="775">|-764【夹道欢迎】</option>



  <option value="776">|-765【中国人也是能够的】</option>



  <option value="777">|-766【祈雨】</option>



  <option value="778">|-767【天府之国】</option>



  <option value="779">|-768【助人助己】</option>



  <option value="780">|-769【比想象中严重】</option>



  <option value="781">|-770【抢粮】</option>



  <option value="782">|-771【霜刃未曾试】</option>



  <option value="783">|-772【打啵Kill】</option>



  <option value="784">|-773【大事化小】</option>



  <option value="785">|-774【周神仙的传说】</option>



  <option value="786">|-775【为富不仁的重庆首富】</option>



  <option value="787">|-776【真正的土豪】</option>



  <option value="788">|-777【大资本家】</option>



  <option value="789">|-第779章 778【吃人】</option>



  <option value="790">|-第780章 779【人祸】</option>



  <option value="791">|-第781章 780【狼狈为奸】</option>



  <option value="792">|-781【末世劫】</option>



  <option value="793">|-782【妖道必须死】</option>



  <option value="794">|-783【杀人还要诛心】</option>



  <option value="795">|-784【退货！】</option>



  <option value="796">|-785【走为上】</option>



  <option value="797">|-786【膝盖中箭的汤半城】</option>



  <option value="798">|-787【自投罗网】</option>



  <option value="799">|-788【快意恩仇的袍哥被堵在人堆里画风突变】</option>



  <option value="800">|-789【公审】</option>



  <option value="801">|-790【扒皮食肉】</option>



  <option value="802">|-791【夔门】</option>



  <option value="803">|-792【同监来访】</option>



  <option value="804">|-793【做客】</option>



  <option value="805">|-794【袍哥救国会】</option>



  <option value="806">|-795【商业计划】</option>



  <option value="807">|-796【拜码头】</option>



  <option value="808">|-797【刘湘来访】</option>



  <option value="809">|-798【副使】</option>



  <option value="810">|-799【战争预警】</option>



  <option value="811">|-800【黑龙会】</option>



  <option value="812">|-801【主场】</option>



  <option value="813">|-802【更改计划】</option>



  <option value="814">|-803【山西老财】</option>



  <option value="815">|-804【咳咳咳】</option>



  <option value="816">|-805【委员长的愤怒】</option>



  <option value="817">|-806【后话】</option>



  <option value="818">|-807【途中】</option>



  <option value="819">|-808【墨索里尼与生大蒜】</option>



  <option value="820">|-809【诗歌朗诵】</option>



  <option value="821">|-810【易经】</option>



  <option value="822">|-811【太极图】</option>



  <option value="823">|-812【人类社会太极八卦系统】</option>



  <option value="824">|-813【英王加冕】</option>



  <option value="825">|-814【偷酒喝的公主】</option>



  <option value="826">|-815【七月】</option>



  <option value="827">|-816【诗会】</option>



  <option value="828">|-817【刘彻】</option>



  <option value="829">|-818【春望】</option>



  <option value="830">|-819【七七事变】</option>



  <option value="831">|-820【英雄叱咤，壮士骁骁】</option>



  <option value="832">|-821【民族进化论】</option>



  <option value="833">|-822【起来，不愿做奴隶的人们】</option>



  <option value="834">|-823【周赫煊能做的】</option>



  <option value="835">|-824【八月】</option>



  <option value="836">|-825【安排】</option>



  <option value="837">|-826【死字旗】</option>



  <option value="838">|-827【与子同袍】</option>



  <option value="839">|-828【内情】</option>



  <option value="840">|-829【人才】</option>



  <option value="841">|-830【故人】</option>



  <option value="842">|-831【药厂】</option>



  <option value="843">|-832【钓鱼城】</option>



  <option value="844">|-833【鸡犬不留】</option>



  <option value="845">|-834【否极泰来】</option>



  <option value="846">|-835【受聘】</option>



  <option value="847">|-836【政府内迁和美国人民抵制日货】</option>



  <option value="848">|-837【任教】</option>



  <option value="849">|-838【史观】</option>



  <option value="850">|-839【信心】</option>



  <option value="851">|-840【美援派】</option>



  <option value="852">|-841【空壳元首】</option>



  <option value="853">|-842【刘湘之死】</option>



  <option value="854">|-843【第一次轰炸重庆】</option>



  <option value="855">|-844【空战】</option>



  <option value="856">|-845【统一战线模范省】</option>



  <option value="857">|-846【老骥伏枥】</option>



  <option value="858">|-847【话不投机】</option>



  <option value="859">|-848【贸易和战争】</option>



  <option value="860">|-849【给老蒋提条件】</option>



  <option value="861">|-850【可爱的美国人民】</option>



  <option value="862">|-851【国际友人】</option>



  <option value="863">|-852【揭露者】</option>



  <option value="864">|-853【拉贝日记】</option>



  <option value="865">|-854【整理资料】</option>



  <option value="866">|-855【无意间做出的漂亮决定】</option>



  <option value="867">|-856【文人】</option>



  <option value="868">|-857【八女投江】</option>



  <option value="869">|-858【火星入侵】</option>



  <option value="870">|-859【水晶之夜】</option>



  <option value="871">|-860【犹太人的历史】</option>



  <option value="872">|-861【美国士族】</option>



  <option value="873">|-862【和平呼吁】</option>



  <option value="874">|-863【中国人和犹太人的交易】</option>



  <option value="875">|-864【招待宴】</option>



  <option value="876">|-865【一个大汉奸的诞生】</option>



  <option value="877">|-866【圣诞节】</option>



  <option value="878">|-867【放映】</option>



  <option value="879">|-868【反应】</option>



  <option value="880">|-869【攻占美国】</option>



  <option value="881">|-870【废除排华法案】</option>



  <option value="882">|-871【PTT会员】</option>



  <option value="883">|-872【心灵鸡汤之父】</option>



  <option value="884">|-873【成功的秘诀】</option>



  <option value="885">|-874【成功学宗师王阳明】</option>



  <option value="886">|-875【回渝】</option>



  <option value="887">|-876【华侨之鹰】</option>



  <option value="888">|-877【双枪老太婆】</option>



  <option value="889">|-878【又喜又忧的周至柔】</option>



  <option value="890">|-879【周委员长】</option>



  <option value="891">|-880【空军大捷】</option>



  <option value="892">|-881【阳明洞】</option>



  <option value="893">|-882【西南联大】</option>



  <option value="894">|-883【入土为安】</option>



  <option value="895">|-884【品烟如品人】</option>



  <option value="896">|-885【闻一多VS刘文典——真人PK】</option>



  <option value="897">|-886【闲扯】</option>



  <option value="898">|-887【养鸡秘笈】</option>



  <option value="899">|-888【吃肉】</option>



  <option value="900">|-889【回忆】</option>



  <option value="901">|-890【宿舍夜谈】</option>



  <option value="902">|-889【回忆】</option>



  <option value="903">|-890【宿舍夜谈】</option>



  <option value="904">|-891【离开】</option>



  <option value="905">|-892【两个逗比】</option>



  <option value="906">|-893【瞎子】</option>



  <option value="907">|-894【维烈——挂科一半的天才儿童】</option>



  <option value="908">|-895【周明诚的缺点】</option>



  <option value="909">|-896【恼羞成怒】</option>



  <option value="910">|-897【七月】</option>


  </select> 之后</dd><dd><input type="submit" name="submit_sort" id="submit_sort" value="确 定"><input type="hidden" name="aid" id="aid" value="89336"></dd></dl></form><dl class="manage_bottom">
<form name="repack" id="repack" action="https://www.88dus.com/modules/article/repack.php?do=submit" method="post">
<dt>重新生成</dt>
<dd>生成选：
  <input type="checkbox" name="packflag[]" value="makeopf">生成OPF(文章目录结构文件)

  <input type="checkbox" name="packflag[]" value="makehtml">生成HTML
  </dd>
  <dd><input type="submit" name="submit_repack" id="submit_repack" value="确 定"><input type="hidden" name="id" id="id" value="89336"></dd>
</form>
</dl></section>
