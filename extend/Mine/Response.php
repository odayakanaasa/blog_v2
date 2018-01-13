<?php
namespace Mine;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// API接口格式化返回值业务类封装    Link: http://www.hlzblog.top/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 注：
//    JSON_UNESCAPED_UNICODE 这个参数可以json不转译unicode值
//    如果不加默认是输出如 {"hello":"\u4e16\u754c"}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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
            $msg = Consts::get($code);
        }
        $result = [
            "code"   => $code,
            "detail" => $msg,
            "data"   => [],
        ];
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 正确返回时的标准返回
     * @param array   data 要返回的数据
     * @param int     code 对应Consts类中的代码号
     */
    public static function success(array $data = [], $code = 200)
    {
        $msg    = Consts::get($code);
        $result = [
            "code"   => 200,
            "detail" => $msg,
            "data"   => $data,
        ];
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

}
