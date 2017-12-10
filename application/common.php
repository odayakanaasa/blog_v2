<?php
// 应用公共文件

/**
 * 获取acc_token
 * @param String  : len 返回长度默认,八位token值
 * @param Int     : type 返回类型[1=>字母+数字,2=>纯数字,3=>纯字母]
 * @return String acc_token值
 */
function acc_token($len = 8, $type = 1)
{
    switch ($type) {
        case 1:
            return substr(str_shuffle("0123456789qwertyuiopasdfghjklzxcvbnm"), 0, $len);
        case 2:
            return substr(str_shuffle("0123456789"), 0, $len);
        default:
            return substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"), 0, $len);
    }

}
/**
 * 输出json格式字符串,并结束程序运行
 * @param Array   : msg 待处理的数组
 * @return void;
 */
function trans_json(array $msg)
{
    echo json_encode($msg);
    exit();
}

/**
 * 判断是否影响行数大于0,用于数据库操作结果判断
 * @param Int   : row 影响行数
 * @param String: url 成功后,可转跳地址
 * @return void;
 */
function if_modify($row, $url = '')
{
    if ($row > 0) {
        $msg['status'] = true;
    } else {
        $msg['status'] = false;
    }
    if ($url != '') {
        $msg['url'] = $url;
    }
    trans_json($msg);
}

// 本地数据,调试专用,2号参数: 0=> print_r, 1=> var_dump, 2=>没有修饰的print_r
function out($param, $type = 0)
{
    $script = '
        <script>
        var yth_mall_debug = true;
        if( yth_mall_debug ){
            window.onload=function(){
            document.body.id="markdown_container";
            var sc=document.createElement("script");
            sc.src="/err/hlz_markdown.js";
            document.body.appendChild(sc);
            }
            yth_mall_debug = false ;
        }
        </script>';
    switch ($type) {
        case 0:
            $func = 'print_r';
            break;
        case 1:
            $func = 'var_dump';
            break;
        case 2:
            $func   = 'print_r';
            $script = '';
            break;
    }
    echo $script . '<pre >';
    $func($param);
    echo '</pre><br />';
}
// link_plugins
function link_plugins($bucket_name, $name)
{
    preg_match('/(.*?)\.(js|css)$/i', $name, $matches);
    unset($matches[0]);
    unset($matches[1]);
    return '/static/plugins/' . $bucket_name . '/' . $matches[2] . '/' . $name;
}
// Link_source [css、js、jpg、png]
function link_src($name)
{
    if (preg_match('/(.*?)\.(js|css)$/i', $name, $matches)) {
        $dir = '/' . $matches[2];
        unset($matches);
        return '/static' . $dir . '/' . $name;
    } elseif (preg_match('/(.*?)\.(jpg|png|gif|jpeg)$/i', $name)) {
        return '/static/img/' . $name;
    }
}

/**
 * CSRF 防御
 * 用户提交表单，如果没有验证码，都得加上这个。设置到header里面
 * @param Int    option 1=> 生成或重置 csrf_token值
 *                      2=> token 检验
 * @param String '0' => 操作失败  其他字符串 => 操作成功
 */
function yth_csrf($option = 1)
{
    $var_name = '__csrf'; // session中的变量名与http请求头的名都设为这个
    switch ($option) {
        case 1: // 返回：csrf_token值
            $token               = acc_token(8, 2);
            $_SESSION[$var_name] = $token;
            return $token;
        case 2: // 返回：检验结果
            $http_name = strtoupper('HTTP_' . $var_name);
            if (isset($_SERVER[$http_name]) && $_SERVER[$http_name] == $_SESSION[$var_name]) {
                return '1';
            }
            return '0';
        default:
            return '0';
    }
}

/**
 * 判断导航栏目的输出
 * @return String
 */
function judge_nav_header()
{
    if (isset($_SESSION['user']['id'])) {
        echo '
        <span><a href="/User/welcome.html">个人中心</a></span>
        <span><a href="javascript:user_logout();">注销</a></span>
        ';
    } else {
        echo '
        <span><a href="/User/index.html">登陆</a></span>
        <span><a href="/User/register.html">注册</a></span>
        ';
    }
}

/**
 * POST请求，并返回数据
 * @param  String      url     访问地址
 * @param  Array|JSON  data    用于POST的数据
 * @param  Array       header  HTTP头请求
 * @return String  返回数据
 */
function curl_request($url, $data = null, $header = null)
{
    //请求 URL，返回该 URL 的内容
    $ch = curl_init(); // 初始化curl
    curl_setopt($ch, CURLOPT_URL, $url); // 设置访问的 URL
    curl_setopt($ch, CURLOPT_HEADER, 0); // 放弃 URL 的头信息
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 返回字符串，而不直接输出
    // Add Headers?
    if ($header) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    // Https ?
    if (preg_match('/^https/', $url)) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 不做服务器的验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 做服务器的证书验证
    }
    // POST method?
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true); // 设置为 POST 请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 设置POST的请求数据
    }
    $content = curl_exec($ch); // 开始访问指定URL
    curl_close($ch); // 关闭 cURL 释放资源
    return $content;
}

/**
 * Seo title
 * @param  String : title   seo_keywords
 * @param  String : title   Seo title prefix
 * @return String
 */
function set_title($seo_keywords = '', $title = '')
{
    // 没有标题信息？
    if ('' == $title) {
        // 没有seo_keywords信息？
        if ('' == $seo_keywords) {
            $title = config('seo_keywords');
        } else {
            $title = $seo_keywords;
        }
    }
    $title .= config('seo_title_suffix');
    return $title;
}
