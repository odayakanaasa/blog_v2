<?php
namespace Mine;
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++  快递查询       Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 使用案例，见文末
use Mine\CurlRequest; // 需要引入 云天河写的对应类

Class ExpressDelivery{
    /**
    * @param String : api_href      快递所属物流公司
    * @param String : api_detail    快递具体信息
    * @param Int    : timer         设置超时时间，单位，秒
    * @param String : post_num      单号 [字母+数字]
    */
    private static $api_href   = 'http://www.kuaidi100.com/autonumber/autoComNum?text='; 
    private static $api_detail = 'http://www.kuaidi100.com/query?';  
    private static $timer      = 3  ;
    private static $post_num ;
    /**
    * 程序入口
    */
    public static function run( $num ){
            self::$post_num    = $num ;   
            self::$api_detail .= self::get_status();   // 拼接第一个接口
            // 发出请求
            $detail  = CurlRequest::run( self::$api_detail );
            $detail  = json_decode( $detail, true );
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
    private static function get_status(){
        // 参数过滤
        self::$api_href .= self::$post_num;   // 组装链接
        // 请求接口
        $result = CurlRequest::run( self::$api_href );
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

}

/** 示例
    $number = $_POST['post_num']; // 接收快递号
    $arr = \Mine\ExpressDelivery::run( $number ); // 直接运行该类，输出相关信息
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