<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++    图灵机器人[电脑版]
//++    Link:  Link: http://hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 使用案例，见文末
namespace Turing_Robot;

@session_start();

class Api
{
    /**
     * @param String pub_api 公共接口，它会返回  XML
     * @param String pri_api 私人接口，它会返回 Json
     * @param String sqy     用户输入内容
     * @param String uid     用户id [自定义 32位]
     */
    private $pub_api = "http://www.tuling123.com/api/product_exper/chat.jhtml";
    private $pri_api = "http://www.tuling123.com/openapi/api";
    private $say;
    private $uid;

    /**
     * 构造函数
     * @param String $say    用户输入内容
     */
    public function __construct($say)
    {
        $this->say = $say;
        $this->uid = md5('yth_chat_' . session_id());
    }

    /**
     * 选择api，进行调用
     * @param  Int    option    默认0 [0=>public_api, 1=>private_api]
     * @return String 返回经urlencode加密的 html字符串
     */
    public function get_result($option = 0)
    {
        if ($option) {
            $temp = $this->private_api();
        } else {
            $temp = $this->public_api();
        }
        return urlencode($temp);
    }

    // 公共图灵Api => 无限次使用
    private function public_api()
    {
        $request_data['info']   = $this->say;
        $request_data['userid'] = $this->uid;
        $back_data              = $this->curl_request($this->pub_api, $request_data);
        $obj                    = simplexml_load_string($back_data, 'SimpleXMLElement', LIBXML_NOCDATA);
        switch ($obj->MsgType) {
            case 'text':
                $html = '<p>' . $obj->Content . '</p>';
                return $html;
                break;
            case 'news':
                $count = $obj->ArticleCount;
                $html  = '';
                for ($i = 0; $i < $count; $i++) {
                    $html .= '<p>' . $obj->Articles->item[$i]->Title . '<br></p>';
                    $html .= '<a href="' . $obj->Articles->item[$i]->Url . '"><img src="' . $obj->Articles->item[$i]->PicUrl . '" /></a>';
                }
                return $html;
                break;
            default:
                return '<p>本宝宝听不懂你在说什么</p>';
                break;
        }
    }

    // 私人图灵Api => [名称]慧慧 [性别] 女
    private function private_api()
    {
        if ($this->say == '') {
            return '人家还不会识图啦~~！';
        }
        // json格式请求，数据形式也得是json格式
        $data = json_encode([
            'key'    => config('Turning_api')['key'], // APIKEY
            'info'   => strip_tags($this->say),
            'userid' => $this->uid,
        ]);
        $header = array(
            'Content-Type: application/json',
        );
        $content = $this->curl_request($this->pri_api, $data, $header);
        $content = json_decode($content, true);
        switch ($content['code']) {
            case '100000':
                return '<p>' . $content['text'] . '</p>';
            case '40002':
                return '<p>' . $content['text'] . '</p>';
            case '40004':
                return '<p>今天我嗓子好累啊。。。有事我们明天聊吧</p>';
            default:
                return '<p>亲爱的，我不明白你的意思啊</p>';
        }
    }

    /**
     * POST请求，并返回数据
     * @param  String url    访问地址
     * @param  Array|JSON   data   用于POST的数据，如果data为空，则为GET请求
     * @param  Array  header HTTP头请求
     * @return String 返回数据
     */
    private function curl_request($url, $data = null, $header = null)
    {
        //请求 URL，返回该 URL 的内容
        $ch = curl_init(); // 初始化curl
        curl_setopt($ch, CURLOPT_URL, $url); //设置访问的 URL
        curl_setopt($ch, CURLOPT_HEADER, 0); //放弃 URL 的头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回字符串，而不直接输出
        // 是否添加 http头
        if ($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        if (preg_match('/^https/', $url)) { //判断是否是使用 https 协议
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不做服务器的验证
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); //做服务器的证书验证
        }
        if ($data) { // 是否是 POST 请求
            curl_setopt($ch, CURLOPT_POST, true); //设置为 POST 请求
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //设置POST的请求数据
        }
        $content = curl_exec($ch); //开始访问指定URL
        curl_close($ch); //关闭 cURL 释放资源
        return $content;
    }
}

// // 注意：数据经过 urldecode
// $say = $_GET['c']; //通过GET方式传入聊天信息
// $api = new \Turing_Robot\Api($say);
// echo $api->get_result(0); // echo $api->get_result(1)
