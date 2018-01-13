<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//  各种数据过滤操作  Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
namespace Mine;

class Filter
{

    /**
     * 数据，存在？
     * @param Array   : 判断数组中的值，是否都存在
     * @return void   : 如果不存在，就结束程序
     */
    public function is_set($param)
    {
        foreach ($param as $k) {
            true === isset($k) ? true : exit(Response::error(1003));
        }
    }

    /**
     * 字符串，为空？
     * @param String : 过滤字符串
     * @param String : 为空的时候，自定义输出内容
     * @return Void
     */
    public static function is_empty($s, $out = false)
    {
        // 是否为空值
        if ('' == $s) {
            // 是否自定义输出错误信息
            if ($out) {
                exit(Response::error(1004, $out));
            } else {
                exit(Response::error(1004));
            }
        }
    }

    /**
     * 整型[十进制][正数]，获取成功？
     * @param  Int   : 原本应该为整型数的字符串，用于过滤的数，不能大于 2^32-1
     * @return Int   : 如果是整型，则返回，否则结束程序
     */
    public static function int($v)
    {
        $i = intval($v, 10);
        $i = abs($i);
        self::is_empty($i);
        return $i;
    }

    /**
     * 邮箱，匹配成功？
     * @param String  : 判断数组中的值，是否都存在
     * @param Boolean : 是否返回匹配结果
     * @return void   : 如果不存在，就结束程序
     */
    public static function email($email, $return = false)
    {
        $RegExp       = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/';
        $match_result = preg_match($RegExp, $email);
        if ($return) {
            return $match_result;
        } else {
            if (!$match_result) {
                exit(Response::error(1001));
            }
        }
    }

    /**
     * 帐号，匹配成功？
     * @param String : 判断帐号格式是否正确
     * @return void  : 如果不正确，就结束程序
     */
    public static function account($account)
    {
        $RegExp = '/^[A-Za-z0-9]{5,16}$/';
        preg_match($RegExp, $account) ? true : exit(Response::error(1002));
    }

    /**
     * 密码，长度适合？
     * @param String : 判断帐号格式是否正确
     * @return void  : 如果不正确，就结束程序
     */
    public static function pwd($pwd)
    {
        if (strlen($pwd) < 6 || strlen($pwd) > 25) {
            //密码长度校验
            exit(Response::error(1005));
        }
    }

    /**
     * 昵称，长度适合？
     * @param String : 判断帐号格式是否正确
     * @return void  : 如果不正确，就结束程序
     */
    public static function is_name($nickname)
    {
        if (strlen($nickname) < 1) {
            $info = '你的昵称太短，请输入1到20个字符';
            exit(Response::error(1006, $info));
        } elseif (strlen($nickname) > 20) {
            $info = '你的昵称太长，请输入2到20个字符';
            exit(Response::error(1006, $info));
        }

    }

    /**
     * 过滤 XSS 脚本
     * @param String : html 需要过滤的html
     * @return String 过滤后的文本
     */
    public static function xss($html)
    {
        return \HTMLPurifier\Main::run($html);
    }

}
