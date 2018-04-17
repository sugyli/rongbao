<?php
if(is_file(  __DIR__ . "/custom_helpers.php" )){
  require( __DIR__ . "/custom_helpers.php" );
}

if (!function_exists('formatTime')) {
  function formatTime($t)
  {
    $t = date("Y-m-d H:i:s",$t);  //24小时
    //dd($t);
    //date("Y-m-d h:i:s");  //12小时
    //$t =  date("Y-n-d h:i",$t);
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $t)->diffForHumans();
  }
}

if (!function_exists('getJsfile')) {
  function getJsfile()
  {
    return config('app.default_js');
  }
}

if (!function_exists('SaveCookUser')) {
  function SaveCookUser()
  {
    \Cookie::queue('islogin', 1, config('app.usercooktime'), $path = null, $domain = null, $secure = false, $httpOnly = false);
  }
}

if (!function_exists('DelCookUser')) {
  function DelCookUser()
  {
    \Cookie::queue('islogin', 0, config('app.usercooktime'), $path = null, $domain = null, $secure = false, $httpOnly = false);
  }
}

/**
 * 求取字符串位数（非字节），以UTF-8编码长度计算
 *
 * @param string $string 需要被计算位数的字符串
 * @return int
 * @author Seven Du <lovevipdsw@vip.qq.com>
 **/

if (!function_exists('getstrlength')) {
  function getstrlength($string)
  {
      $length = strlen($string);
      $index  = $num = 0;
      while ($index < $length) {
          $str = $string[$index];
          if ($str < "\xC0") {
              $index += 1;
          } elseif ($str < "\xE0") {
              $index += 2;
          } elseif ($str < "\xF0") {
              $index += 3;
          } elseif ($str < "\xF8") {
              $index += 4;
          } elseif ($str < "\xFC") {
              $index += 5;
          } else {
              $index += 6;
          }
          $num += 1;
      }
      return $num;
  }
}

?>
