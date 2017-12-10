<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++           获取客户端ip 、对应地理位置 Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
namespace Mine;

class Location
{

    /**
     * 通过新浪api 获取IP对应的地理位置
     * @param String  : ip 传入IP地址
     * @return String : 国家+省份+市
     */
    public static function ip_location($ip)
    {
        $ipContent = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=" . $ip);
        $ip_info   = json_decode($ipContent);
        $this_addr = @trim($ip_info->country . ' ' . $ip_info->province . ' ' . $ip_info->city);
        return $this_addr;
    }

    /**
     * 获取用户IP
     * @param  String : return_array 是否返回截取的ip
     * @return String|Array : 用户实际IP | [用户实际IP,截取前两段的IP]
     */
    public static function get_ip($return_array = false)
    {
        //如果客户端 没有通过代理服务器来访问
        if (!empty($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])) {
            $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
        } elseif (!empty($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])) {
            $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
        } elseif (!empty($HTTP_SERVER_VARS["REMOTE_ADDR"])) {
            $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
        }
        //如果客户端 通过代理服务器来访问
        elseif (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } elseif (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("REMOTE_ADDR")) {
            $ip = getenv("REMOTE_ADDR");
        } else {
            $ip = "Unknown";
        }
        // 选择返回的数据格式
        if (!$return_array) {
            return $ip;
        } else {
            $sub_ip = explode(".", $ip, 3); // 以 . 为界限差分为3个字符串
            array_pop($sub_ip); //去掉最后一个字符串
            $sub_ip = implode(".", $sub_ip);
            return [
                "real_ip" => $ip,
                "sub_ip"  => $sub_ip,
            ];
        }
    }
}
