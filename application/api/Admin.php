<?php
/**
 * 管理员接口 基类
 */
namespace app\api;

use Crypt\Rsa;
use Crypt\yth_crypt;

class Admin
{
    /**
     * 先解密=> RSA -> urldecode  再加密=> 对称 -> md5
     * @param  String : str  待处理的数据
     * @param  Boolean: pwd  false=>帐号,true=>密码
     * @return String
     */
    public static function crypt($str, $pwd = true)
    {
        $str = \Crypt\Rsa::decrypt($str);
        $str = urldecode($str);
        if ($pwd) {
            $str = \Crypt\yth_crypt::encrypt($str);
            $str = md5($str);
        }
        return $str;
    }

    // 权限控制，要求 Admin
    public static function auth()
    {
        // 如果开启了单元测试
        if ( true == config('unit_switch') ) {
            $data['pic']      = 'http://img.cdn.hlzblog.top/17-6-25/39571626.jpg';
            $data['name']     = '云天河-单元测试';
            $data['id']       = -1;
            $_SESSION = $data; // 写入权限
        }else{
            if (!isset($_SESSION['user']['id']) || -1 != $_SESSION['user']['id']) {
                $msg['Err'] = '1002';
                trans_json($msg);
            }
        }
    }

    // 前置操作
    public function __construct()
    {
        self::auth();
    }

}
