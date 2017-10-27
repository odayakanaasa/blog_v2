<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++  带颜色的日志输出  Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 用法，见文末
namespace Mine;
Class Log{

  // 初始信息配置
  static $_ini = [
    'switch' => true , // Boolean  关 => false 开 => true
    'level' => 1 ,     // 该日志等级及以上，可以写入日志中
    'time_zone' => 'Asia/Chongqing', // 时区
    'path' => 'logs', // 日志存放路径
  ];

  /**
  * 输出日志
  * @param string $info  日志信息
  * @param int    $level 日志等级  1=>调试  2=>普通信息 3=>敏感信息 4=>报错信息
  */
  public static function out($info, $level){
    // 覆盖配置
    $get_ini = config('log_colored') ? config('log_colored'): [];
    self::$_ini = array_merge(self::$_ini, $get_ini);
    // 日志开关
    if( self::$_ini['switch'] == false ){
      return;
    }
    // 日志写入资格
    if( $level < self::$_ini['level'] ){
      return;
    }
    // 时区设置
    date_default_timezone_set(self::$_ini['time_zone']);

    $str = date('H:i:s'); // 输出时间
    switch ($level) {
      case 1:
        $name = ' Debug  ';
        $color = 'light_cyan';
        break;
      case 2:
        $name = ' Info   ';
        $color = 'white';
        break;
      case 3:
        $name = ' Info   ';
        $color = 'yellow';
        break;
      case 4:
        $name = ' Error  ';
        $color = 'light_red';
        break;
      default:
        exit('日志等级，设置错误');
        break;
    }
    $info = $str. $name . $info."\n";
    $str = self::getColoredString($info, $color);
    self::write($str);
  } 

  
  /**
  * 追加写入日志
  * @param string $str  格式化后的日志信息
  */
  private static function write($str){
    // 写入目录存在？
    $dir_path = self::$_ini['path'];
    if( !is_dir($dir_path) ){
      mkdir($dir_path);
    }
    // 追加写入文件
    $file_path  = $dir_path . '/' . date('Y-m-d') . '.log';
    $fp = fopen($ , 'a+');
    fwrite($fp, $str);
    fclose($fp);
  }

  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  配色方案
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  private static $foreground_colors = [
    'black' => '0;30',
    'dark_gray' => '1;30',
    'blue' => '0;34',
    'light_blue' => '1;34',
    'green' => '0;32',
    'light_green' => '1;32',
    'cyan' => '0;36',
    'light_cyan' => '1;36',
    'red' => '0;31',
    'light_red' => '1;31',
    'purple' => '0;35',
    'light_purple' => '1;35',
    'brown' => '0;33',
    'yellow' => '1;33',
    'light_gray' => '0;37',
    'white' => '1;37',
  ];
  private static $background_colors = [
    'black' => '40',
    'red' => '41',
    'green' => '42',
    'yellow' => '43',
    'blue' => '44',
    'magenta' => '45',
    'cyan' => '46',
    'light_gray' => '47',
  ];

  /**
  * 返回可带背景色的有色字符串
  * @param string $str  格式化后的日志信息
  * @param string $foreground_color  字体色
  * @param string $background_color  背景色
  * @return string
  */
  private static function getColoredString($string, $foreground_color = null, $background_color = null) {
    $colored_string = "";
    // Check if given foreground color found
    if (isset(self::$foreground_colors[$foreground_color])) {
      $colored_string .= "\033[" . self::$foreground_colors[$foreground_color] . "m";
    }
    // Check if given background color found
    if (isset(self::$background_colors[$background_color])) {
      $colored_string .= "\033[" . self::$background_colors[$background_color] . "m";
    }
    // Add string and end coloring
    $colored_string .=  $string . "\033[0m";
    return $colored_string;
  }

}

/*
示例
use Mine\Log;

Log::out('xxx', 1);
Log::out('xxxxxxxxxx', 2);
Log::out('xxxxxxxxxxxxxxxxxx', 3);

*/