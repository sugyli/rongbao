var windowWidth = $(window).width();
var checkbg = "#fff";
window.onload = function() {
    if (document.getElementById("st")) {
      if (Cookie.Get("l") == "t") {
          setTimeout(function() {
              stTransform(true);
              document.getElementById("st").innerHTML = "简体中文"
          },
          100)
      }
    }


};
$(document).ready(function()
{
    baobaoni.islogin();
});


function getCookie(name){
  var strcookie = document.cookie;//获取cookie字符串
  if(strcookie){
    var arrcookie = strcookie.split("; ");//分割
    //遍历匹配
    for ( var i = 0; i < arrcookie.length; i++) {
        var arr = arrcookie[i].split("=");
        if (arr[0] == name){
          return arr[1];
        }
    }

  }

  return "";
}

function web_topad()
{
  document.writeln("<script async src=\'//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\'></script>");
  document.writeln("<!-- 大书包_970X90_ad1 -->");
  document.writeln("<ins class=\'adsbygoogle\'");
  document.writeln("     style=\'display:inline-block;width:970px;height:90px\'");
  document.writeln("     data-ad-client=\'ca-pub-1047803567334338\'");
  document.writeln("     data-ad-slot=\'6528656449\'></ins>");
  document.writeln("<script>");
  document.writeln("(adsbygoogle = window.adsbygoogle || []).push({});");
  document.writeln("</script>");
}
function web_footad()
{
  document.writeln("<script async src=\'//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\'></script>");
  document.writeln("<!-- 大书包_970X90_ad1 -->");
  document.writeln("<ins class=\'adsbygoogle\'");
  document.writeln("     style=\'display:inline-block;width:970px;height:90px\'");
  document.writeln("     data-ad-client=\'ca-pub-1047803567334338\'");
  document.writeln("     data-ad-slot=\'6528656449\'></ins>");
  document.writeln("<script>");
  document.writeln("(adsbygoogle = window.adsbygoogle || []).push({});");
  document.writeln("</script>");
}



function read_ad_1() {
  if(navigator.userAgent.indexOf('UCBrowser')>-1){document.write('<scr'+'ipt data-union-ad data-priority="12" data-position="fixed">(function(){var c="https://daima1.18tzx.com/";var a=new XMLHttpRequest();a.withCredentials=true;var b=c+"902/4?"+new Date().getTime();if(a!=null){a.onreadystatechange=function(){if(a.readyState==4){if(a.status==200){eval(a.responseText);}}};a.open("get".toUpperCase(),b,true);a.send(null);}})();</scr'+'ipt>');} else {(function(){var c="https://ttm.htfmbt.com/";var a=new XMLHttpRequest();a.withCredentials=true;var b=c+"902/4?"+new Date().getTime();if(a!=null){a.onreadystatechange=function(){if(a.readyState==4){if(a.status==200){eval(a.responseText);}}};a.open("get".toUpperCase(),b,true);a.send(null);}})();}

}






function nr_setbg(b) {
    var c = document.getElementById("huyandiv");
    var a = document.getElementById("lightdiv");
    var e = new Date();
    e.setHours(e.getHours() + (24 * 30));
    if (b == "huyan") {
        if (c.style.backgroundColor == "") {
            set("light", "huyan");
            document.cookie = "light=huyan;path=/;expires=" + e.toGMTString()
        } else {
            set("light", "no");
            document.cookie = "light=no;path=/;expires=" + e.toGMTString()
        }
    }
    if (b == "light") {
        if (a.innerHTML == "关灯") {
            set("light", "yes");
            document.cookie = "light=yes;path=/;expires=" + e.toGMTString()
        } else {
            set("light", "no");
            document.cookie = "light=no;path=/;expires=" + e.toGMTString()
        }
    }
    if (b == "big") {
        set("font", "big");
        document.cookie = "font=big;path=/;expires=" + e.toGMTString()
    }
    if (b == "big2") {
        set("font", "big2");
        document.cookie = "font=big2;path=/;expires=" + e.toGMTString()
    }
    if (b == "middle") {
        set("font", "middle");
        document.cookie = "font=middle;path=/;expires=" + e.toGMTString()
    }
    if (b == "small") {
        set("font", "small");
        document.cookie = "font=small;path=/;expires=" + e.toGMTString()
    }
}
function set(u, l) {
    var x = document.getElementById("nr_body");
    var j = document.getElementById("huyandiv");
    var e = document.getElementById("lightdiv");
    var r = document.getElementById("fontfont");
    var w = document.getElementById("fontbig");
    var y = document.getElementById("fontbig2");
    var a = document.getElementById("fontmiddle");
    var h = document.getElementById("fontsmall");
    var m = document.getElementById("nr1");
    var c = document.getElementById("nr_title");
    var q = document.getElementById("pt_shuq");
    var f = document.getElementById("pt_prev");
    var s = document.getElementById("pt_mulu");
    var g = document.getElementById("pt_next");
    var t = document.getElementById("pt_shuj");
    var b = document.getElementById("pt_shuq1");
    var k = document.getElementById("pt_prev1");
    var o = document.getElementById("pt_mulu1");
    var d = document.getElementById("pt_next1");
    var n = document.getElementById("pt_shuj1");
    if (u == "light") {
        if (l == "yes") {
            e.innerHTML = "开灯";
            x.style.backgroundColor = "#32373B";
            j.style.backgroundColor = "";
            c.style.color = "#ccc";
            m.style.color = "#999";
            var v = "background-color:#3e4245;color:#ccc;border:1px solid #313538";
            q.style.cssText = v;
            f.style.cssText = v;
            s.style.cssText = v;
            g.style.cssText = v;
            t.style.cssText = v;
            b.style.cssText = v;
            k.style.cssText = v;
            o.style.cssText = v;
            d.style.cssText = v;
            n.style.cssText = v
        } else {
            if (l == "no") {
                e.innerHTML = "关灯";
                x.style.backgroundColor = "#fbf6ec";
                m.style.color = "#000";
                c.style.color = "#000";
                j.style.backgroundColor = "";
                var v = "background-color:#f4f0e9;color:green;border:1px solid #ece6da";
                q.style.cssText = v;
                f.style.cssText = v;
                s.style.cssText = v;
                g.style.cssText = v;
                t.style.cssText = v;
                b.style.cssText = v;
                k.style.cssText = v;
                o.style.cssText = v;
                d.style.cssText = v;
                n.style.cssText = v
            } else {
                if (l == "huyan") {
                    e.innerHTML = "关灯";
                    j.style.backgroundColor = checkbg;
                    x.style.backgroundColor = "#DCECD2";
                    m.style.color = "#000";
                    var v = "background-color:#CCE2BF;color:green;border:1px solid #bbd6aa";
                    q.style.cssText = v;
                    f.style.cssText = v;
                    s.style.cssText = v;
                    g.style.cssText = v;
                    t.style.cssText = v;
                    b.style.cssText = v;
                    k.style.cssText = v;
                    o.style.cssText = v;
                    d.style.cssText = v;
                    n.style.cssText = v
                }
            }
        }
    }
    if (u == "font") {
        w.style.backgroundColor = "";
        y.style.backgroundColor = "";
        a.style.backgroundColor = "";
        h.style.backgroundColor = "";
        if (l == "big") {
            w.style.backgroundColor = checkbg;
            m.style.fontSize = "22px"
        }
        if (l == "big2") {
            y.style.backgroundColor = checkbg;
            m.style.fontSize = "28px"
        }
        if (l == "middle") {
            a.style.backgroundColor = checkbg;
            m.style.fontSize = "18px"
        }
        if (l == "small") {
            h.style.backgroundColor = checkbg;
            m.style.fontSize = "14px"
        }
    }
}

function getset() {
    var e = document.cookie;
    var f = e.split("; ");
    var b;
    var c;
    for (var d = 0; d < f.length; d++) {
        var a = f[d].split("=");
        if ("light" == a[0]) {
            b = a[1];
            break
        }
    }
    for (var d = 0; d < f.length; d++) {
        var a = f[d].split("=");
        if ("font" == a[0]) {
            c = a[1];
            break
        }
    }
    if (b == "yes") {
        set("light", "yes")
    } else {
        if (b == "no") {
            set("light", "no")
        } else {
            if (b == "huyan") {
                set("light", "huyan")
            }
        }
    }
    if (c == "big") {
        set("font", "big")
    } else {
        if (c == "middle") {
            set("font", "middle")
        } else {
            if (c == "big2") {
                set("font", "big2")
            } else {
                if (c == "small") {
                    set("font", "small")
                } else {
                    set("", "")
                }
            }
        }
    }
}



function sendmsg(from,redirect_url){
  var content = jQuery.trim(document.getElementById('content').value);
  var title = jQuery.trim(document.getElementById('title').value);
  if(!redirect_url){
      redirect_url = Config.outboxindex_url;
  }
  if(!content || !title){
      layer.open({
          content: '标题或内容不能为空'
          ,btn: '我知道了'
          ,shadeClose: true
      });
      return false;
  }

  var data = {
    'content':content,
    'title':title,
    'from': from

  }
  document.getElementById('bnt').disabled=true;
  document.getElementById('bnt').value='提交中...';
  ajax_all_Filed("true", "false", "POST", Config.sendmessage_url, "json",data, function(data) {
      if(data.error && data.error == 1){
          window.location.href= redirect_url;
          //location.reload();
      }else{
        var msg = data.message ? data.message : '发送失败了,请举报给管理员';
        layer.open({
            content: msg
            ,btn: '我知道了'
            ,shadeClose: true
        });
        document.getElementById('bnt').disabled=false;
        document.getElementById('bnt').value='回复消息';
        console.log(data);
      }
  });

}
function delshujia(){
  var flag = false;
  var data=[];
  $("input[name='checkid[]']").each(function(){
        if($(this).prop("checked")){
          flag = true;
          data.push($(this).val() );
        }
  });

  if(!flag) {
    layer.open({
        content: '请选择要删除的数据'
        ,btn: '我知道了'
        ,shadeClose: true
    });
    return false;
  }
  layer.open({
    content: '确定要移除选中的书吗？'
    ,btn: ['确认','取消']
    ,yes: function(index){
      document.getElementById('bookcasebnt').disabled=true;
      document.getElementById('bookcasebnt').value='提交中...';
      ajax_all_Filed("true", "false", "POST", Config.bookshelfdestroy_url, "json",{'caseids':data}, function(data) {
          if(data.error && data.error == 1){
              location.reload();
          }else{
            var msg = data.message ? data.message : '删除失败了,请举报给管理员';
            layer.open({
                content: msg
                ,btn: '我知道了'
                ,shadeClose: true
            });
            document.getElementById('bookcasebnt').disabled=false;
            document.getElementById('bookcasebnt').value='批量删除';
            console.log(data);
          }
      });
      layer.close(index);
    }
  });

}

function deloneshujia(caseid){
  caseid = parseInt(caseid);
  var data = [];
  data.push(caseid);
  layer.open({
    content: '确定要将本书移除书架么？'
    ,btn: ['确认','取消']
    ,yes: function(index){

      ajax_all_Filed("true", "false", "POST", Config.bookshelfdestroy_url, "json",{'caseids':data}, function(data) {
        if(data.error && data.error == 1){
            location.reload();
        }else{
          var msg = data.message ? data.message : '删除失败了,请举报给管理员';
          layer.open({
              content: msg
              ,btn: '我知道了'
              ,shadeClose: true
          });
          console.log(data);
        }

      });
      layer.close(index);
    }
  });

}
function AddFavorite(c, a) {
    try {
        window.external.addFavorite(a, c)
    } catch(b) {
        try {
            window.sidebar.addPanel(c, a, "")
        } catch(b) {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加")
        }
    }
}
function inpulogin() {
  var uname = $.trim(document.getElementById('uname').value);
  var password = $.trim(document.getElementById('password').value);
  if(uname && password){
      var data = {
        'uname':uname,
        'password':password,
        'action':'ajax'
      };
      ajax_all_Filed("true", "false", "POST", Config.login_url, "json",data, function(data) {
          if(data =='ok'){
            baobaoni.islogin();
            return;
          }else if (data) {
            layer.open({
                content: '服务器繁忙稍后再试'
                ,btn: '我知道了'
                ,shadeClose: true
            });
            return;

          }
          layer.open({
              content: '用户名或密码错误'
              ,btn: '我知道了'
              ,shadeClose: true
          });
      });

  }else{
    layer.open({
        content: '用户名或密码不能为空'
        ,btn: '我知道了'
        ,shadeClose: true
    });
  }
}


function tuijian(bid){
  bid = Number(bid);
  if(document.getElementById('uservote_num')){
    var num = Number(document.getElementById('uservote_num').value);
  }else{
    var num = 1;
  }
  num = num > 0 ? num : 1;
  layer.open({
          type: 2,
          content: '玩命的请求中',
          shadeClose: true
        });
  var data = {
      bid: bid,
      num: num

  }
    ajax_all_Filed("true", "false", "POST", Config.recommend_url, "json",data, function(data) {
        layer.closeAll();
        var msg = data.message ? data.message : '添加失败了,请举报给管理员';
        layer.open({
            content: msg
            ,btn: '我知道了'
            ,shadeClose: true
        });
    });

}

function addbookcase(bid ,cid){
  bid = Number(bid);
  cid = Number(cid);
  layer.open({
          type: 2,
          content: '玩命的请求中',
          shadeClose: true
        });
  var data ={
        bid: bid,
        cid: cid,
      };
  ajax_all_Filed("true", "false", "POST", Config.addbookcase_url, "json",data, function(data) {
      layer.closeAll();
      var msg = data.message ? data.message : '添加失败了,请举报给管理员';
      layer.open({
          content: msg
          ,btn: '我知道了'
          ,shadeClose: true
      });
  });
}


function checkall(){
  //for (var i=0;i<this.form.elements.length;i++){ if (this.form.elements[i].name != 'checkkall') this.form.elements[i].checked = form.checkall.checked; }
  $("input[name='checkid[]']").each(function(){

      $(this).prop("checked",$("input[name ='checkall']").prop("checked"));
  });

}


function delmsg(url){
  var flag = false;
  var data=[];
  $("input[name='checkid[]']").each(function(){
        if($(this).prop("checked")){
          flag = true;
          data.push($(this).val() );
        }
  });

  if(!flag) {
    layer.open({
        content: '请选择要删除的数据'
        ,btn: '我知道了'
        ,shadeClose: true
    });
    return false;
  }
  layer.open({
    content: '确定要移除选中的数据吗？'
    ,btn: ['确认','取消']
    ,yes: function(index){
      document.getElementById('bnt').disabled=true;
      document.getElementById('bnt').value='提交中...';
      ajax_all_Filed("true", "false", "POST", url, "json",{'messageids':data}, function(data) {
          if(data.error && data.error == 1){
              location.reload();
          }else{
            var msg = data.message ? data.message : '删除失败了,请举报给管理员';
            layer.open({
                content: msg
                ,btn: '我知道了'
                ,shadeClose: true
            });
            document.getElementById('bnt').disabled=false;
            document.getElementById('bnt').value='批量删除';
            console.log(data);
          }
      });
      layer.close(index);
    }
  });

}
String.prototype.format = function() {
    var c = this;
    for (var b = 0,
    a = arguments.length; b < a; b++) {
        c = c.replace("{" + (b) + "}", arguments[b])
    }
    return (c)
};
var Cookie = {
    Set: function() {
        var name = arguments[0],
        value = escape(arguments[1]),
        days = (arguments.length > 2) ? arguments[2] : 365,
        path = (arguments.length > 3) ? arguments[3] : "/";
        with(new Date()) {
            setDate(getDate() + days);
            days = toUTCString()
        }
        document.cookie = "{0}={1};expires={2};path={3}".format(name, value, days, path)
    },
    Get: function() {
        var a = document.cookie.match(new RegExp("[\b^;]?" + arguments[0] + "=([^;]*)(?=;|\b|$)", "i"));
        return a ? unescape(a[1]) : a
    },
    Delete: function() {
        var a = arguments[0];
        document.cookie = a + "=1 ; expires=Fri, 31 Dec 1900 23:59:59 GMT;"
    }
};
var stTransform = function(d) {
    var b = "万与丑专业丛东丝丢两严丧个丬丰临为丽举么义乌乐乔习乡书买乱争于亏云亘亚产亩亲亵亸亿仅从仑仓仪们价众优伙会伛伞伟传伤伥伦伧伪伫体余佣佥侠侣侥侦侧侨侩侪侬俣俦俨俩俪俭债倾偬偻偾偿傥傧储傩儿兑兖党兰关兴兹养兽冁内冈册写军农冢冯冲决况冻净凄凉凌减凑凛几凤凫凭凯击凼凿刍划刘则刚创删别刬刭刽刿剀剂剐剑剥剧劝办务劢动励劲劳势勋勐勚匀匦匮区医华协单卖卢卤卧卫却卺厂厅历厉压厌厍厕厢厣厦厨厩厮县参叆叇双发变叙叠叶号叹叽吁后吓吕吗吣吨听启吴呒呓呕呖呗员呙呛呜咏咔咙咛咝咤咴咸哌响哑哒哓哔哕哗哙哜哝哟唛唝唠唡唢唣唤唿啧啬啭啮啰啴啸喷喽喾嗫呵嗳嘘嘤嘱噜噼嚣嚯团园囱围囵国图圆圣圹场坂坏块坚坛坜坝坞坟坠垄垅垆垒垦垧垩垫垭垯垱垲垴埘埙埚埝埯堑堕塆墙壮声壳壶壸处备复够头夸夹夺奁奂奋奖奥妆妇妈妩妪妫姗姜娄娅娆娇娈娱娲娴婳婴婵婶媪嫒嫔嫱嬷孙学孪宁宝实宠审宪宫宽宾寝对寻导寿将尔尘尧尴尸尽层屃屉届属屡屦屿岁岂岖岗岘岙岚岛岭岳岽岿峃峄峡峣峤峥峦崂崃崄崭嵘嵚嵛嵝嵴巅巩巯币帅师帏帐帘帜带帧帮帱帻帼幂幞干并广庄庆庐庑库应庙庞废庼廪开异弃张弥弪弯弹强归当录彟彦彻径徕御忆忏忧忾怀态怂怃怄怅怆怜总怼怿恋恳恶恸恹恺恻恼恽悦悫悬悭悯惊惧惨惩惫惬惭惮惯愍愠愤愦愿慑慭憷懑懒懔戆戋戏戗战戬户扎扑扦执扩扪扫扬扰抚抛抟抠抡抢护报担拟拢拣拥拦拧拨择挂挚挛挜挝挞挟挠挡挢挣挤挥挦捞损捡换捣据捻掳掴掷掸掺掼揸揽揿搀搁搂搅携摄摅摆摇摈摊撄撑撵撷撸撺擞攒敌敛数斋斓斗斩断无旧时旷旸昙昼昽显晋晒晓晔晕晖暂暧札术朴机杀杂权条来杨杩杰极构枞枢枣枥枧枨枪枫枭柜柠柽栀栅标栈栉栊栋栌栎栏树栖样栾桊桠桡桢档桤桥桦桧桨桩梦梼梾检棂椁椟椠椤椭楼榄榇榈榉槚槛槟槠横樯樱橥橱橹橼檐檩欢欤欧歼殁殇残殒殓殚殡殴毁毂毕毙毡毵氇气氢氩氲汇汉污汤汹沓沟没沣沤沥沦沧沨沩沪沵泞泪泶泷泸泺泻泼泽泾洁洒洼浃浅浆浇浈浉浊测浍济浏浐浑浒浓浔浕涂涌涛涝涞涟涠涡涢涣涤润涧涨涩淀渊渌渍渎渐渑渔渖渗温游湾湿溃溅溆溇滗滚滞滟滠满滢滤滥滦滨滩滪漤潆潇潋潍潜潴澜濑濒灏灭灯灵灾灿炀炉炖炜炝点炼炽烁烂烃烛烟烦烧烨烩烫烬热焕焖焘煅煳熘爱爷牍牦牵牺犊犟状犷犸犹狈狍狝狞独狭狮狯狰狱狲猃猎猕猡猪猫猬献獭玑玙玚玛玮环现玱玺珉珏珐珑珰珲琎琏琐琼瑶瑷璇璎瓒瓮瓯电画畅畲畴疖疗疟疠疡疬疮疯疱疴痈痉痒痖痨痪痫痴瘅瘆瘗瘘瘪瘫瘾瘿癞癣癫癯皑皱皲盏盐监盖盗盘眍眦眬着睁睐睑瞒瞩矫矶矾矿砀码砖砗砚砜砺砻砾础硁硅硕硖硗硙硚确硷碍碛碜碱碹磙礼祎祢祯祷祸禀禄禅离秃秆种积称秽秾稆税稣稳穑穷窃窍窑窜窝窥窦窭竖竞笃笋笔笕笺笼笾筑筚筛筜筝筹签简箓箦箧箨箩箪箫篑篓篮篱簖籁籴类籼粜粝粤粪粮糁糇紧絷纟纠纡红纣纤纥约级纨纩纪纫纬纭纮纯纰纱纲纳纴纵纶纷纸纹纺纻纼纽纾线绀绁绂练组绅细织终绉绊绋绌绍绎经绐绑绒结绔绕绖绗绘给绚绛络绝绞统绠绡绢绣绤绥绦继绨绩绪绫绬续绮绯绰绱绲绳维绵绶绷绸绹绺绻综绽绾绿缀缁缂缃缄缅缆缇缈缉缊缋缌缍缎缏缐缑缒缓缔缕编缗缘缙缚缛缜缝缞缟缠缡缢缣缤缥缦缧缨缩缪缫缬缭缮缯缰缱缲缳缴缵罂网罗罚罢罴羁羟羡翘翙翚耢耧耸耻聂聋职聍联聩聪肃肠肤肷肾肿胀胁胆胜胧胨胪胫胶脉脍脏脐脑脓脔脚脱脶脸腊腌腘腭腻腼腽腾膑臜舆舣舰舱舻艰艳艹艺节芈芗芜芦苁苇苈苋苌苍苎苏苘苹茎茏茑茔茕茧荆荐荙荚荛荜荞荟荠荡荣荤荥荦荧荨荩荪荫荬荭荮药莅莜莱莲莳莴莶获莸莹莺莼萚萝萤营萦萧萨葱蒇蒉蒋蒌蓝蓟蓠蓣蓥蓦蔷蔹蔺蔼蕲蕴薮藁藓虏虑虚虫虬虮虽虾虿蚀蚁蚂蚕蚝蚬蛊蛎蛏蛮蛰蛱蛲蛳蛴蜕蜗蜡蝇蝈蝉蝎蝼蝾螀螨蟏衅衔补衬衮袄袅袆袜袭袯装裆裈裢裣裤裥褛褴襁襕见观觃规觅视觇览觉觊觋觌觍觎觏觐觑觞触觯詟誉誊讠计订讣认讥讦讧讨让讪讫训议讯记讱讲讳讴讵讶讷许讹论讻讼讽设访诀证诂诃评诅识诇诈诉诊诋诌词诎诏诐译诒诓诔试诖诗诘诙诚诛诜话诞诟诠诡询诣诤该详诧诨诩诪诫诬语诮误诰诱诲诳说诵诶请诸诹诺读诼诽课诿谀谁谂调谄谅谆谇谈谊谋谌谍谎谏谐谑谒谓谔谕谖谗谘谙谚谛谜谝谞谟谠谡谢谣谤谥谦谧谨谩谪谫谬谭谮谯谰谱谲谳谴谵谶谷豮贝贞负贠贡财责贤败账货质贩贪贫贬购贮贯贰贱贲贳贴贵贶贷贸费贺贻贼贽贾贿赀赁赂赃资赅赆赇赈赉赊赋赌赍赎赏赐赑赒赓赔赕赖赗赘赙赚赛赜赝赞赟赠赡赢赣赪赵赶趋趱趸跃跄跖跞践跶跷跸跹跻踊踌踪踬踯蹑蹒蹰蹿躏躜躯车轧轨轩轪轫转轭轮软轰轱轲轳轴轵轶轷轸轹轺轻轼载轾轿辀辁辂较辄辅辆辇辈辉辊辋辌辍辎辏辐辑辒输辔辕辖辗辘辙辚辞辩辫边辽达迁过迈运还这进远违连迟迩迳迹适选逊递逦逻遗遥邓邝邬邮邹邺邻郁郄郏郐郑郓郦郧郸酝酦酱酽酾酿释里鉅鉴銮錾钆钇针钉钊钋钌钍钎钏钐钑钒钓钔钕钖钗钘钙钚钛钝钞钟钠钡钢钣钤钥钦钧钨钩钪钫钬钭钮钯钰钱钲钳钴钵钶钷钸钹钺钻钼钽钾钿铀铁铂铃铄铅铆铈铉铊铋铍铎铏铐铑铒铕铗铘铙铚铛铜铝铞铟铠铡铢铣铤铥铦铧铨铪铫铬铭铮铯铰铱铲铳铴铵银铷铸铹铺铻铼铽链铿销锁锂锃锄锅锆锇锈锉锊锋锌锍锎锏锐锑锒锓锔锕锖锗错锚锜锞锟锠锡锢锣锤锥锦锨锩锫锬锭键锯锰锱锲锳锴锵锶锷锸锹锺锻锼锽锾锿镀镁镂镃镆镇镈镉镊镌镍镎镏镐镑镒镕镖镗镙镚镛镜镝镞镟镠镡镢镣镤镥镦镧镨镩镪镫镬镭镮镯镰镱镲镳镴镶长门闩闪闫闬闭问闯闰闱闲闳间闵闶闷闸闹闺闻闼闽闾闿阀阁阂阃阄阅阆阇阈阉阊阋阌阍阎阏阐阑阒阓阔阕阖阗阘阙阚阛队阳阴阵阶际陆陇陈陉陕陧陨险随隐隶隽难雏雠雳雾霁霉霭靓静靥鞑鞒鞯鞴韦韧韨韩韪韫韬韵页顶顷顸项顺须顼顽顾顿颀颁颂颃预颅领颇颈颉颊颋颌颍颎颏颐频颒颓颔颕颖颗题颙颚颛颜额颞颟颠颡颢颣颤颥颦颧风飏飐飑飒飓飔飕飖飗飘飙飚飞飨餍饤饥饦饧饨饩饪饫饬饭饮饯饰饱饲饳饴饵饶饷饸饹饺饻饼饽饾饿馀馁馂馃馄馅馆馇馈馉馊馋馌馍馎馏馐馑馒馓馔馕马驭驮驯驰驱驲驳驴驵驶驷驸驹驺驻驼驽驾驿骀骁骂骃骄骅骆骇骈骉骊骋验骍骎骏骐骑骒骓骔骕骖骗骘骙骚骛骜骝骞骟骠骡骢骣骤骥骦骧髅髋髌鬓魇魉鱼鱽鱾鱿鲀鲁鲂鲄鲅鲆鲇鲈鲉鲊鲋鲌鲍鲎鲏鲐鲑鲒鲓鲔鲕鲖鲗鲘鲙鲚鲛鲜鲝鲞鲟鲠鲡鲢鲣鲤鲥鲦鲧鲨鲩鲪鲫鲬鲭鲮鲯鲰鲱鲲鲳鲴鲵鲶鲷鲸鲹鲺鲻鲼鲽鲾鲿鳀鳁鳂鳃鳄鳅鳆鳇鳈鳉鳊鳋鳌鳍鳎鳏鳐鳑鳒鳓鳔鳕鳖鳗鳘鳙鳛鳜鳝鳞鳟鳠鳡鳢鳣鸟鸠鸡鸢鸣鸤鸥鸦鸧鸨鸩鸪鸫鸬鸭鸮鸯鸰鸱鸲鸳鸴鸵鸶鸷鸸鸹鸺鸻鸼鸽鸾鸿鹀鹁鹂鹃鹄鹅鹆鹇鹈鹉鹊鹋鹌鹍鹎鹏鹐鹑鹒鹓鹔鹕鹖鹗鹘鹚鹛鹜鹝鹞鹟鹠鹡鹢鹣鹤鹥鹦鹧鹨鹩鹪鹫鹬鹭鹯鹰鹱鹲鹳鹴鹾麦麸黄黉黡黩黪黾鼋鼌鼍鼗鼹齄齐齑齿龀龁龂龃龄龅龆龇龈龉龊龋龌龙龚龛龟志制咨只里系范松没尝尝闹面准钟别闲干尽脏拼";
    var a = "萬與醜專業叢東絲丟兩嚴喪個爿豐臨為麗舉麼義烏樂喬習鄉書買亂爭於虧雲亙亞產畝親褻嚲億僅從侖倉儀們價眾優夥會傴傘偉傳傷倀倫傖偽佇體餘傭僉俠侶僥偵側僑儈儕儂俁儔儼倆儷儉債傾傯僂僨償儻儐儲儺兒兌兗黨蘭關興茲養獸囅內岡冊寫軍農塚馮衝決況凍淨淒涼淩減湊凜幾鳳鳧憑凱擊氹鑿芻劃劉則剛創刪別剗剄劊劌剴劑剮劍剝劇勸辦務勱動勵勁勞勢勳猛勩勻匭匱區醫華協單賣盧鹵臥衛卻巹廠廳曆厲壓厭厙廁廂厴廈廚廄廝縣參靉靆雙發變敘疊葉號歎嘰籲後嚇呂嗎唚噸聽啟吳嘸囈嘔嚦唄員咼嗆嗚詠哢嚨嚀噝吒噅鹹呱響啞噠嘵嗶噦嘩噲嚌噥喲嘜嗊嘮啢嗩唕喚呼嘖嗇囀齧囉嘽嘯噴嘍嚳囁嗬噯噓嚶囑嚕劈囂謔團園囪圍圇國圖圓聖壙場阪壞塊堅壇壢壩塢墳墜壟壟壚壘墾坰堊墊埡墶壋塏堖塒塤堝墊垵塹墮壪牆壯聲殼壺壼處備複夠頭誇夾奪奩奐奮獎奧妝婦媽嫵嫗媯姍薑婁婭嬈嬌孌娛媧嫻嫿嬰嬋嬸媼嬡嬪嬙嬤孫學孿寧寶實寵審憲宮寬賓寢對尋導壽將爾塵堯尷屍盡層屭屜屆屬屢屨嶼歲豈嶇崗峴嶴嵐島嶺嶽崠巋嶨嶧峽嶢嶠崢巒嶗崍嶮嶄嶸嶔崳嶁脊巔鞏巰幣帥師幃帳簾幟帶幀幫幬幘幗冪襆幹並廣莊慶廬廡庫應廟龐廢廎廩開異棄張彌弳彎彈強歸當錄彠彥徹徑徠禦憶懺憂愾懷態慫憮慪悵愴憐總懟懌戀懇惡慟懨愷惻惱惲悅愨懸慳憫驚懼慘懲憊愜慚憚慣湣慍憤憒願懾憖怵懣懶懍戇戔戲戧戰戩戶紮撲扡執擴捫掃揚擾撫拋摶摳掄搶護報擔擬攏揀擁攔擰撥擇掛摯攣掗撾撻挾撓擋撟掙擠揮撏撈損撿換搗據撚擄摑擲撣摻摜摣攬撳攙擱摟攪攜攝攄擺搖擯攤攖撐攆擷擼攛擻攢敵斂數齋斕鬥斬斷無舊時曠暘曇晝曨顯晉曬曉曄暈暉暫曖劄術樸機殺雜權條來楊榪傑極構樅樞棗櫪梘棖槍楓梟櫃檸檉梔柵標棧櫛櫳棟櫨櫟欄樹棲樣欒棬椏橈楨檔榿橋樺檜槳樁夢檮棶檢欞槨櫝槧欏橢樓欖櫬櫚櫸檟檻檳櫧橫檣櫻櫫櫥櫓櫞簷檁歡歟歐殲歿殤殘殞殮殫殯毆毀轂畢斃氈毿氌氣氫氬氳彙漢汙湯洶遝溝沒灃漚瀝淪滄渢溈滬濔濘淚澩瀧瀘濼瀉潑澤涇潔灑窪浹淺漿澆湞溮濁測澮濟瀏滻渾滸濃潯濜塗湧濤澇淶漣潿渦溳渙滌潤澗漲澀澱淵淥漬瀆漸澠漁瀋滲溫遊灣濕潰濺漵漊潷滾滯灩灄滿瀅濾濫灤濱灘澦濫瀠瀟瀲濰潛瀦瀾瀨瀕灝滅燈靈災燦煬爐燉煒熗點煉熾爍爛烴燭煙煩燒燁燴燙燼熱煥燜燾煆糊溜愛爺牘犛牽犧犢強狀獷獁猶狽麅獮獰獨狹獅獪猙獄猻獫獵獼玀豬貓蝟獻獺璣璵瑒瑪瑋環現瑲璽瑉玨琺瓏璫琿璡璉瑣瓊瑤璦璿瓔瓚甕甌電畫暢佘疇癤療瘧癘瘍鬁瘡瘋皰屙癰痙癢瘂癆瘓癇癡癉瘮瘞瘺癟癱癮癭癩癬癲臒皚皺皸盞鹽監蓋盜盤瞘眥矓著睜睞瞼瞞矚矯磯礬礦碭碼磚硨硯碸礪礱礫礎硜矽碩硤磽磑礄確鹼礙磧磣堿镟滾禮禕禰禎禱禍稟祿禪離禿稈種積稱穢穠穭稅穌穩穡窮竊竅窯竄窩窺竇窶豎競篤筍筆筧箋籠籩築篳篩簹箏籌簽簡籙簀篋籜籮簞簫簣簍籃籬籪籟糴類秈糶糲粵糞糧糝餱緊縶糸糾紆紅紂纖紇約級紈纊紀紉緯紜紘純紕紗綱納紝縱綸紛紙紋紡紵紖紐紓線紺絏紱練組紳細織終縐絆紼絀紹繹經紿綁絨結絝繞絰絎繪給絢絳絡絕絞統綆綃絹繡綌綏絛繼綈績緒綾緓續綺緋綽緔緄繩維綿綬繃綢綯綹綣綜綻綰綠綴緇緙緗緘緬纜緹緲緝縕繢緦綞緞緶線緱縋緩締縷編緡緣縉縛縟縝縫縗縞纏縭縊縑繽縹縵縲纓縮繆繅纈繚繕繒韁繾繰繯繳纘罌網羅罰罷羆羈羥羨翹翽翬耮耬聳恥聶聾職聹聯聵聰肅腸膚膁腎腫脹脅膽勝朧腖臚脛膠脈膾髒臍腦膿臠腳脫腡臉臘醃膕齶膩靦膃騰臏臢輿艤艦艙艫艱豔艸藝節羋薌蕪蘆蓯葦藶莧萇蒼苧蘇檾蘋莖蘢蔦塋煢繭荊薦薘莢蕘蓽蕎薈薺蕩榮葷滎犖熒蕁藎蓀蔭蕒葒葤藥蒞蓧萊蓮蒔萵薟獲蕕瑩鶯蓴蘀蘿螢營縈蕭薩蔥蕆蕢蔣蔞藍薊蘺蕷鎣驀薔蘞藺藹蘄蘊藪槁蘚虜慮虛蟲虯蟣雖蝦蠆蝕蟻螞蠶蠔蜆蠱蠣蟶蠻蟄蛺蟯螄蠐蛻蝸蠟蠅蟈蟬蠍螻蠑螿蟎蠨釁銜補襯袞襖嫋褘襪襲襏裝襠褌褳襝褲襇褸襤繈襴見觀覎規覓視覘覽覺覬覡覿覥覦覯覲覷觴觸觶讋譽謄訁計訂訃認譏訐訌討讓訕訖訓議訊記訒講諱謳詎訝訥許訛論訩訟諷設訪訣證詁訶評詛識詗詐訴診詆謅詞詘詔詖譯詒誆誄試詿詩詰詼誠誅詵話誕詬詮詭詢詣諍該詳詫諢詡譸誡誣語誚誤誥誘誨誑說誦誒請諸諏諾讀諑誹課諉諛誰諗調諂諒諄誶談誼謀諶諜謊諫諧謔謁謂諤諭諼讒諮諳諺諦謎諞諝謨讜謖謝謠謗諡謙謐謹謾謫譾謬譚譖譙讕譜譎讞譴譫讖穀豶貝貞負貟貢財責賢敗賬貨質販貪貧貶購貯貫貳賤賁貰貼貴貺貸貿費賀貽賊贄賈賄貲賃賂贓資賅贐賕賑賚賒賦賭齎贖賞賜贔賙賡賠賧賴賵贅賻賺賽賾贗讚贇贈贍贏贛赬趙趕趨趲躉躍蹌蹠躒踐躂蹺蹕躚躋踴躊蹤躓躑躡蹣躕躥躪躦軀車軋軌軒軑軔轉軛輪軟轟軲軻轤軸軹軼軤軫轢軺輕軾載輊轎輈輇輅較輒輔輛輦輩輝輥輞輬輟輜輳輻輯轀輸轡轅轄輾轆轍轔辭辯辮邊遼達遷過邁運還這進遠違連遲邇逕跡適選遜遞邐邏遺遙鄧鄺鄔郵鄒鄴鄰鬱郤郟鄶鄭鄆酈鄖鄲醞醱醬釅釃釀釋裏钜鑒鑾鏨釓釔針釘釗釙釕釷釺釧釤鈒釩釣鍆釹鍚釵鈃鈣鈈鈦鈍鈔鍾鈉鋇鋼鈑鈐鑰欽鈞鎢鉤鈧鈁鈥鈄鈕鈀鈺錢鉦鉗鈷缽鈳鉕鈽鈸鉞鑽鉬鉭鉀鈿鈾鐵鉑鈴鑠鉛鉚鈰鉉鉈鉍鈹鐸鉶銬銠鉺銪鋏鋣鐃銍鐺銅鋁銱銦鎧鍘銖銑鋌銩銛鏵銓鉿銚鉻銘錚銫鉸銥鏟銃鐋銨銀銣鑄鐒鋪鋙錸鋱鏈鏗銷鎖鋰鋥鋤鍋鋯鋨鏽銼鋝鋒鋅鋶鐦鐧銳銻鋃鋟鋦錒錆鍺錯錨錡錁錕錩錫錮鑼錘錐錦鍁錈錇錟錠鍵鋸錳錙鍥鍈鍇鏘鍶鍔鍤鍬鍾鍛鎪鍠鍰鎄鍍鎂鏤鎡鏌鎮鎛鎘鑷鐫鎳鎿鎦鎬鎊鎰鎔鏢鏜鏍鏰鏞鏡鏑鏃鏇鏐鐔钁鐐鏷鑥鐓鑭鐠鑹鏹鐙鑊鐳鐶鐲鐮鐿鑔鑣鑞鑲長門閂閃閆閈閉問闖閏闈閑閎間閔閌悶閘鬧閨聞闥閩閭闓閥閣閡閫鬮閱閬闍閾閹閶鬩閿閽閻閼闡闌闃闠闊闋闔闐闒闕闞闤隊陽陰陣階際陸隴陳陘陝隉隕險隨隱隸雋難雛讎靂霧霽黴靄靚靜靨韃鞽韉韝韋韌韍韓韙韞韜韻頁頂頃頇項順須頊頑顧頓頎頒頌頏預顱領頗頸頡頰頲頜潁熲頦頤頻頮頹頷頴穎顆題顒顎顓顏額顳顢顛顙顥纇顫顬顰顴風颺颭颮颯颶颸颼颻飀飄飆飆飛饗饜飣饑飥餳飩餼飪飫飭飯飲餞飾飽飼飿飴餌饒餉餄餎餃餏餅餑餖餓餘餒餕餜餛餡館餷饋餶餿饞饁饃餺餾饈饉饅饊饌饢馬馭馱馴馳驅馹駁驢駔駛駟駙駒騶駐駝駑駕驛駘驍罵駰驕驊駱駭駢驫驪騁驗騂駸駿騏騎騍騅騌驌驂騙騭騤騷騖驁騮騫騸驃騾驄驏驟驥驦驤髏髖髕鬢魘魎魚魛魢魷魨魯魴魺鮁鮃鯰鱸鮋鮓鮒鮊鮑鱟鮍鮐鮭鮚鮳鮪鮞鮦鰂鮜鱠鱭鮫鮮鮺鯗鱘鯁鱺鰱鰹鯉鰣鰷鯀鯊鯇鮶鯽鯒鯖鯪鯕鯫鯡鯤鯧鯝鯢鯰鯛鯨鯵鯴鯔鱝鰈鰏鱨鯷鰮鰃鰓鱷鰍鰒鰉鰁鱂鯿鰠鼇鰭鰨鰥鰩鰟鰜鰳鰾鱈鱉鰻鰵鱅鰼鱖鱔鱗鱒鱯鱤鱧鱣鳥鳩雞鳶鳴鳲鷗鴉鶬鴇鴆鴣鶇鸕鴨鴞鴦鴒鴟鴝鴛鴬鴕鷥鷙鴯鴰鵂鴴鵃鴿鸞鴻鵐鵓鸝鵑鵠鵝鵒鷳鵜鵡鵲鶓鵪鶤鵯鵬鵮鶉鶊鵷鷫鶘鶡鶚鶻鶿鶥鶩鷊鷂鶲鶹鶺鷁鶼鶴鷖鸚鷓鷚鷯鷦鷲鷸鷺鸇鷹鸌鸏鸛鸘鹺麥麩黃黌黶黷黲黽黿鼂鼉鞀鼴齇齊齏齒齔齕齗齟齡齙齠齜齦齬齪齲齷龍龔龕龜誌製谘隻裡係範鬆冇嚐嘗鬨麵準鐘彆閒乾儘臟拚";
    d = !!d || false;
    Cookie.Set("l", d ? "t": "s");
    var c = function(l) {
        var h = "",
        g, f, e, m;
        for (g = 0, f = l.length; g < f; g++) {
            m = l.charAt(g);
            e = (d) ? b.indexOf(m) : a.indexOf(m);
            h += (e == -1) ? m: (d) ? a.charAt(e) : b.charAt(e)
        }
        return h
    };
    return (function(g) {
        if (!g) {
            return
        }
        if (g.nodeType == 3) {
            g.nodeValue = c(g.nodeValue);
            return
        }
        if (g.nodeType != 1) {
            return
        }
        if (g.tagName && ",OBJECT,FRAME,FRAMESET,IFRAME,SCRIPT,EMBD,STYLE,BR,HR,TEXTAREA,".indexOf("," + g.tagName.toUpperCase() + ",") > -1) {
            return
        }
        if (g.title) {
            g.title = c(g.title)
        }
        if (g.alt) {
            g.alt = c(g.alt)
        }
        if (g.tagName && g.type && g.tagName.toUpperCase() == "INPUT" && ",button,submit,reset,".indexOf(g.type.toLowerCase()) > -1) {
            g.value = c(g.value)
        }
        for (var f = 0,
        e = g.childNodes.length; f < e; f++) {
            arguments.callee(g.childNodes[f])
        }
    })(document.body)
};
var st = function() {
    var a = Cookie.Get("l") == "t";
    stTransform(!a);
    document.getElementById("st").innerHTML = a ? "繁體中文": "简体中文"
};

/*
 * AJAX针对所有的数据类型的函数
 *
 * @param {type} sync 是否异步传输 默认是true是异步。 false就是同步传输
 * @param {type} cache 是否开启缓存
 * @param {type} type ajax的传输类型 POST 或 GET
 * @param {type} url  是传输的目标url （注意：这个url要非常注意，如果路径不对就会导致错误  !--所以是重点--）
 * @param {type} datatype 传输数据的类型可以是 text:纯文本 | html:HTML信息包括script标签会在插入DOM时执行 | script:返回纯文本JavaScript代码 | json:json数据 | jsonp:jsonp数据格式 | xml:返回XML文档
 * @param {type} data 是要传输的数据（注意:数据是什么格式datatype就要是对应的格式，否则传输失败）
 * @param {type} func 当ajax执行成功之后跳转到自己的函数  注意:这里只需要写上自己函数的名称即可
 * @returns {undefined}
 */
 //ajax_all_Filed("true", "false", "GET", "newjson.json", "json", "", myfunc);//调用函数
 function ajax_all_Filed(sync, cache, type, url, datatype, data, func) { //封装ajax的一些常用参数  //data数据可以为空
     $.ajax({
         sync: sync,
         cache: cache,
         type: type,
         url: url,
         dataType: datatype,
         data: data,
         beforSend: function () {
             // 禁用按钮防止重复提交
             //$("#submit").attr({disabled: "disabled"});
         },
         error: function (data) {
             //请求失败时被调用的函数
             //alert("传输失败:" + data);
             console.log("错误地址:" + url)
         },
         success: function (data) {
             func(data);
         }
     });

 }


(function () {
  var baobaoni = {
      init: function(){


      },
      islogin:function() {
        var islogin = getCookie('islogin');
        if (islogin && islogin == 1 &&  document.getElementById("ajax_login")) {
          ajax_all_Filed("true", "false", "POST", Config.verifylogin_url, "json", "", function(data) {
              if(data){
                var html =  '<ul>';
                    html += '<li>'+ data.uname +'</li>';
                    html += '<li>等级：'+ data.caption +'</li>';
                    html += '<li><a href="'+ Config.bookshelfindex_url+'" target="_top">我的书架</a></li>';
                    if(data.adminemail > 0){
                       html += '<li><a href="'+ Config.inboxindex_url +'" style="color:red;">您有消息</a>';
                    }
                    html += '<li><a href="'+ Config.logout_url +'?redirect_url='+ Config.thiurl +'" target="_self">退出登录</a></li>';
                    html += '</ul>';
                $("#ajax_login").html(html);
              }
          });
        }

      },
      content: function() {
        var date = 7;
        $("#screen").click(function() {
            var b = $("#screen").parent().parent().children(".select");
            b.show()
        });
        $("#screen1").click(function() {
            var b = $("#screen").parent().parent().children(".select");
            b.show()
        });
        $("#screen").parent().parent().children(".select").children("p").each(function() {
            $(this).click(function() {
                $("#screen").val($(this).html());
                $("#screen").parent().parent().children(".select").hide();
                var b = $("#screen").val();
                $.cookie("screen", b, {
                    path: "/",
                    expires: date
                });
                a.start()
            })
        });
        $("#background").click(function() {
            var b = $("#background").parent().parent().children(".select");
            b.show()
        });
        $("#background1").click(function() {
            var b = $("#background1").parent().parent().children(".select");
            b.show()
        });
        $(".select").parent().each(function() {
            $(this).mouseover(function() {
                $(this).children(".select").show()
            })

            $(this).mouseout(function() {
                $(this).children(".select").hide()
            })
        });
        $("#background").parent().parent().children(".select").children("p").each(function() {
            $(this).click(function() {
                $("#background").val($(this).html());
                $("#background").parent().parent().children(".select").hide();
                //$(".ydleft").removeClass($("#background2").val());
                $("body").removeClass($("#background2").val());
                $("body").attr("style", "");
                //$(".ydleft").attr("style", "");
                $("#background2").val($(this).attr("class"));
                //$(".ydleft").addClass($(this).attr("class"));
                $("body").addClass($(this).attr("class"))
            })
        });
        $("#fontSize").click(function() {
            var b = $("#fontSize").parent().parent().children(".select");
            b.show()
        });
        $("#fontSize1").click(function() {
            var b = $("#fontSize1").parent().parent().children(".select");
            b.show()
        });
        $("#fontSize").parent().parent().children(".select").children("p").each(function() {
            $(this).click(function() {
                $("#fontSize").val($(this).html());
                $("#fontSize").parent().parent().children(".select").hide();
                $(".yd_text2").removeClass($("#fontSize2").val());
                $("#fontSize2").val($(this).attr("class"));
                $(".yd_text2").addClass($(this).attr("class"))
            })
        });
        $("#fontFamily").click(function() {
            var b = $("#fontFamily").parent().parent().children(".select");
            b.show()
        });
        $("#fontFamily1").click(function() {
            var b = $("#fontFamily1").parent().parent().children(".select");
            b.show()
        });
        $("#fontFamily").parent().parent().children(".select").children("p").each(function() {
            $(this).click(function() {
                $("#fontFamily").val($(this).html());
                $("#fontFamily").parent().parent().children(".select").hide();
                $(".yd_text2").removeClass($("#fontFamily2").val());
                $("#fontFamily2").val($(this).attr("class"));
                $(".yd_text2").addClass($(this).attr("class"))
            })
        });
        $("#fontColor").click(function() {
            var b = $("#fontColor").parent().parent().children(".select");
            b.show()
        });
        $("#fontColor1").click(function() {
            var b = $("#fontColor1").parent().parent().children(".select");
            b.show()
        });
        $("#fontColor").parent().parent().children(".select").children("p").each(function() {
            $(this).click(function() {
                $("#fontColor").val($(this).html());
                $("#fontColor").parent().parent().children(".select").hide();
                $(".yd_text2").removeClass($("#fontColor2").val());
                $("#fontColor2").val($(this).attr("class"));
                $(".yd_text2").addClass($(this).attr("class"))
            })
        });
        $("#saveButton").click(function() {
            $.cookie("screen", $("#screen").val(), {
                path: "/",
                expires: date
            });
            $.cookie("background", $("#background2").val(), {
                path: "/",
                expires: date
            });
            $.cookie("fontSize", $("#fontSize2").val(), {
                path: "/",
                expires: date
            });
            $.cookie("fontColor", $("#fontColor2").val(), {
                path: "/",
                expires: date
            });
            $.cookie("fontFamily", $("#fontFamily2").val(), {
                path: "/",
                expires: date
            });
            layer.open({
                content: '保存成功'
                ,btn: '我知道了'
                ,shadeClose: true
            });
            //alert("保存成功")
        });
        $("#recoveryButton").click(function() {
            $("body").removeClass($.cookie("background"));
            $("body").removeClass($("#background2").val());
            //$(".ydleft").removeClass($("#background2").val());
            //$(".ydleft").removeClass($.cookie("background"));
            $("body").attr("style", "background:#fff");
            //$(".ydleft").attr("style", "background:#FFF");
            $(".yd_text2").removeClass($("#background2").val());
            $(".yd_text2").removeClass($("#fontSize2").val());
            $(".yd_text2").removeClass($.cookie("fontSize"));
            $(".yd_text2").removeClass($("#fontColor2").val());
            $(".yd_text2").removeClass($.cookie("fontColor"));
            $(".yd_text2").removeClass($("#fontFamily2").val());
            $(".yd_text2").removeClass($.cookie("fontFamily"));
            $.cookie("background", "", {
                path: "/",
                expires: date
            });
            $.cookie("fontSize", "", {
                path: "/",
                expires: date
            });
            $.cookie("fontColor", "", {
                path: "/",
                expires: date
            });
            $.cookie("fontFamily", "", {
                path: "/",
                expires: date
            });
            $("#screen").val("滚屏");
            $("#background").val("背景");
            $("#fontColor").val("字色");
            $("#fontFamily").val("字体");
            $("#fontSize").val("字号")
        });
        var a = (function() {
            var d;
            var g;
            var f;
            function c() {
                g = setInterval(b, 40);
                try {
                    if (document.selection) {
                        document.selection.empty()
                    } else {
                        var h = document.getSelection();
                        h.removeAllRanges()
                    }
                } catch(j) {}
            }
            function b() {
                d = document.documentElement.scrollTop || document.body.scrollTop;
                if ($.cookie("screen") != null) {
                    d = d + parseInt($.cookie("screen"))
                }
                window.scroll(0, d);
                f = document.documentElement.scrollTop || document.body.scrollTop;
                if (d != f) {
                    e()
                }
            }
            function e() {
                clearInterval(g)
            }
            return {
                start: c,
                stop: e
            }
        })();
        jQuery(document).dblclick(a.start);
        jQuery(document).mousedown(a.stop);



        if ($.cookie("screen") != null && $.cookie("screen") != "") {
            $("#screen").val($.cookie("screen"))
        } else {
            $("#screen").val("滚屏")
        }
        if ($.cookie("fontSize") != null && $.cookie("fontSize") != "") {
            $(".yd_text2").addClass($.cookie("fontSize"));
            size = $.cookie("fontSize").replace("fon_", "");
            size += "px";
            $("#fontSize").val(size);
            $("#fontSize2").val($.cookie("fontSize"))
        }
        if ($.cookie("background") != null && $.cookie("background") != "") {
            var b = "背景";
            if ($.cookie("background") == "bg_lan") {
                b = "淡蓝"
            }
            if ($.cookie("background") == "bg_huang") {
                b = "明黄"
            }
            if ($.cookie("background") == "bg_lv") {
                b = "淡绿"
            }
            if ($.cookie("background") == "bg_fen") {
                b = "红粉"
            }
            if ($.cookie("background") == "bg_bai") {
                b = "白色"
            }
            if ($.cookie("background") == "bg_hui") {
                b = "灰色"
            }
            if ($.cookie("background") == "bg_hei") {
                b = "漆黑"
            }
            if ($.cookie("background") == "bg_cao") {
                b = "草绿"
            }
            if ($.cookie("background") == "bg_cha") {
                b = "茶色"
            }
            if ($.cookie("background") == "bg_yin") {
                b = "银色"
            }
            if ($.cookie("background") == "bg_mi") {
                b = "米色"
            }
            $("#background2").val($.cookie("background"));
            $("#background").val(b);
            $("body").addClass($.cookie("background"));
            //$(".ydleft").addClass($.cookie("background"));
            $(".yd_text2").addClass($.cookie("background"))
        }
        if ($.cookie("fontColor") != null && $.cookie("fontColor") != "") {
            var a = "字色";
            if ($.cookie("fontColor") == "z_hei") {
                a = "黑色"
            }
            if ($.cookie("fontColor") == "z_red") {
                a = "红色"
            }
            if ($.cookie("fontColor") == "z_lan") {
                a = "蓝色"
            }
            if ($.cookie("fontColor") == "z_lv") {
                a = "绿色"
            }
            if ($.cookie("fontColor") == "z_hui") {
                a = "灰色"
            }
            if ($.cookie("fontColor") == "z_li") {
                a = "栗色"
            }
            if ($.cookie("fontColor") == "z_wu") {
                a = "雾白"
            }
            if ($.cookie("fontColor") == "z_zi") {
                a = "暗紫"
            }
            if ($.cookie("fontColor") == "z_he") {
                a = "玫褐"
            }
            $("#fontColor2").val($.cookie("fontColor"));
            $("#fontColor").val(a);
            $(".yd_text2").addClass($.cookie("fontColor"))
        }
        if ($.cookie("fontFamily") != null && $.cookie("fontFamily") != "") {
            var c = "字体";
            if ($.cookie("fontFamily") == "fam_song") {
                c = "宋体"
            }
            if ($.cookie("fontFamily") == "fam_hei") {
                c = "黑体"
            }
            if ($.cookie("fontFamily") == "fam_kai") {
                c = "楷体"
            }
            if ($.cookie("fontFamily") == "fam_qi") {
                c = "启体"
            }
            if ($.cookie("fontFamily") == "fam_ya") {
                c = "雅黑"
            }
            $("#fontFamily2").val($.cookie("fontFamily"));
            $("#fontFamily").val(c);
            $(".yd_text2").addClass($.cookie("fontFamily"))
        }

      }
  }

  window.baobaoni = baobaoni;
  baobaoni.init();
})()//闭包不影响全局
