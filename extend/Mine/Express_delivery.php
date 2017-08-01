<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++  快递查询 Link:  Link: http://hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 使用案例，见文末
namespace Mine;
Class Express_delivery{
    /**
    * @param String : api_href      快递所属物流公司
    * @param String : api_detail    快递具体信息
    * @param Int    : timer         设置超时时间，单位，秒
    * @param String : post_num      单号 [字母+数字]
    */
    private $api_href   = 'http://www.kuaidi100.com/autonumber/autoComNum?text='; 
    private $api_detail = 'http://www.kuaidi100.com/query?';  
    private $timer      = 3  ;
    private $post_num ;
    /**
    * 程序入口
    */
    public function __construct( $num ){
            $this->post_num    = $num ;   
            $this->api_detail .= $this->get_status();   // 拼接第一个接口
            // 发出请求
            $detail  = $this->curl_request( $this->api_detail );
            $detail  = json_decode( $detail,true );
            if(  $detail['message'] == 'ok'  ){
                $msg['info'] = &$detail['data'] ;
            }else{
                $msg['out'] = &$detail['message'];
            }
            echo json_encode($msg);
            exit();
    }

    /**
    * 查看单号所属公司，拼接为 GET 参数
    * @return String
    */
    private function get_status(){
        // 参数过滤
        $this->api_href .= $this->post_num;   // 组装链接
        // 请求接口
        $result = $this->curl_request( $this->api_href );
        // 调试接口
        $info = json_decode( $result, true );
        if(  count( $info['auto'] ) ){
            return http_build_query([
                'type'  =>  $info['auto'][0]['comCode'],  // 快递名
                'postid'=>  $info['num'],                 // 快递单号
                'r'     =>  microtime()                   // 防缓存参数
            ]);
        }else{
            exit('{"out":"抱歉，暂无查询记录"}');
        }
    }

    
    /** 
    *  POST请求，并返回数据
    * @param  String      url     访问地址
    * @param  Array|JSON  data    用于POST的数据
    * @param  Array       header  HTTP头请求
    * @return String  返回数据
    */
    private function curl_request($url, $data = null, $header=null ){
        //请求 URL，返回该 URL 的内容   
        $ch = curl_init(); // 初始化curl  
        curl_setopt($ch, CURLOPT_URL, $url); // 设置访问的 URL  
        curl_setopt($ch, CURLOPT_HEADER, 0); // 放弃 URL 的头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 返回字符串，而不直接输出
        // Add Heads?
        if( $header ){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        // Https protocol?
        if( preg_match('/^https/', $url) ){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 不做服务器的验证  
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  // 做服务器的证书验证
        }
        // POST method?
        if( $data ){
            curl_setopt($ch, CURLOPT_POST, true); // 设置为 POST 请求  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 设置POST的请求数据  
        }
        $content = curl_exec($ch); // 开始访问指定URL  
        curl_close($ch); // 关闭 cURL 释放资源 
        return $content;
    }

}

/** 示例
    $number = $_POST['post_num']; // 接收快递号
    new \Mine\Express_delivery( $number ); // 直接运行该类，输出相关信息
// 失败时，输出如下
    {"out":"抱歉，暂无查询记录"}
// 成功时，输出如下
    {"info": [
        {
            "time": "2017-03-02 02:21:16",
            "ftime": "2017-03-02 02:21:16",
            "context": "\u6c5f\u95e8\u8f6c\u8fd0\u4e2d\u5fc3 \u5df2\u53d1\u51fa,\u4e0b\u4e00\u7ad9 \u6d4e\u5357\u8f6c\u8fd0\u4e2d\u5fc3",
            "location": null
        }, {
            "time": "2017-03-02 01:41:59",
            "ftime": "2017-03-02 01:41:59",
            "context": "\u6c5f\u95e8\u8f6c\u8fd0\u4e2d\u5fc3 \u5df2\u6536\u5165",
            "location": null
        }
            ]
    }
*/