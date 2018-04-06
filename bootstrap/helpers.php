<?php
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