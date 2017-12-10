<?php
namespace Mine;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// API接口格式化返回值业务类封装    Link: http://www.hlzblog.top/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 注：
//    JSON_UNESCAPED_UNICODE 这个参数可以json不转译unicode值
//    如果不加默认是输出如 {"hello":"\u4e16\u754c"}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
use Mine\Consts;

class Response
{

    /**
     * 错误信息
     * @param int    code 项目中的状态码
     * @param string message 错误信息，输出配置中的对应信息, 若该项为空 则直接输出自定义的字符串中的内容
     */
    public static function error($code, $message = '')
    {
        if (!empty($message)) {
            $msg = $message;
        } else {
            $msg = self::has_code();
        }
        $result = [
            "code"   => $code,
            "detail" => $msg,
            "data"   => [],
        ];
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public static function success(array $data = [], $code = 200)
    {
        $msg    = self::has_code();
        $result = [
            "code"   => 200,
            "detail" => $msg,
            "data"   => $data,
        ];
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 如果对于code存在，则返回对应字符串，否则返回错误提示信息
     * @param string code 项目中的状态码
     * @return string 对应提示信息
     */
    private static function has_code($code)
    {
        $code_name = 'code_' . $code;
        if (!isset(Consts::$code_name)) {
            $msg = 'code: ' . $code . ' 未设置';
        } else {
            $msg = Consts::$code_name;
        }
        return $msg;
    }

}
