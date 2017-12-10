<?php
namespace OAuth2;

@session_start();

// 示例，见文末，请先开启session
class Entrance
{
    /**
     * OAuth功能
     * @param String : source 资源目录
     * @param Int     : 功能选择，1=>登陆跳转，2=>获取登陆信息
     */
    public static function run($source = 'qq', $func = 1)
    {
        // 资源地址
        $require_path = dirname(__FILE__) . "/" . $source . '/core.php';
        if (!is_file($require_path)) {
            exit('{"Err"=>1010}');
        }
        require_once $require_path;
        // 功能实现
        $ins = new \Oauth_API();
        switch ($func) {
            case 1:
                return $ins->to_url(); // String 返回验证链接
            case 2:
                return @$ins->get_info(); // Array 获取 登陆信息
            default:
                exit('{"out"=>"当前未定义该功能"}');
        }
    }
}

// QQ登陆，链接
// $url = \OAuth2\Entrance::run('qq',1);
// header("Location: $url");

// QQ登陆，回调地址
//     echo "<pre>";
//     print_r( $info );
//     echo "</pre>";
