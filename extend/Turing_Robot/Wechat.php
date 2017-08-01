<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++    图灵机器人[微信版][无限次调用]
//++    Link:  Link: http://hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 使用案例，见文末
namespace Turing_Robot;
@session_start();
class Wechat{
    /** 
    * @param String $get_unique_uid 通过此网址 可获取与用户 一对一的临时对话 UID 
    * @param String $to_api     图灵机器人的实现接口，它会返回XML
    * @param String $fromUsername  用户名
    * @param String $toUsername 公众号
    * @param Long   $time 当前时间
    */  
    private $get_unique_uid = "http://www.tuling123.com/experience/exp_virtual_robot.jhtml?nav=exp";  
    private $to_api         = "http://www.tuling123.com/api/product_exper/chat.jhtml";
    private $fromUsername   ;
    private $toUsername     ;
    private $time;
    /** 
     *析构函数 
     * @param  String $say 用户输入数据 
     * @return void 
    */  
    public function __construct($say){
        $this->get_chat_id();
        $this->analysis($say);
    }  

    /**
    * 获取机器人与用户的对话的userid，通过正则表达式即可获取 
    * @param  $_SESSION['__Turing_Chat__'] 机器人与用户对话所用的唯一的临时ID 
    * @return Void 
    */  
    public function get_chat_id(){
        //如果用户还没有临时对话变量，则注册一个 $_SESSION['char_id']  
        if( !isset($_SESSION['__Turing_Chat__']) ){
            $_SESSION['__Turing_Chat__'] = 'yth_chat'.substr( str_shuffle("0123456789qwertyuiopasdfghjklzxcvbnm") , 0 , 20  );;
        }
    }  
    /** 
    * POST请求，并返回数据
    * @param  String url  访问地址
    * @param  Array|Json  data 用于POST的数据，如果data为空，则为GET请求
    * @return 返回数据
    */  
    private function curl_request($url, $data = null){
        //请求 URL，返回该 URL 的内容   
        $ch = curl_init(); // 初始化curl  
        curl_setopt($ch, CURLOPT_URL, $url); //设置访问的 URL  
        curl_setopt($ch, CURLOPT_HEADER, false); //放弃 URL 的头信息  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回字符串，而不直接输出
        if( preg_match('/^https/', $url) ){ //判断是否是使用 https 协议
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不做服务器的验证  
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  //做服务器的证书验证  
        }  
        if( $data != null ){ // 是否是 POST 请求  
            curl_setopt($ch, CURLOPT_POST, true); //设置为 POST 请求  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //设置POST的请求数据  
        }  
        $content = curl_exec($ch); //开始访问指定URL  
        curl_close($ch);//关闭 cURL 释放资源 
        return $content;  
    }

    /**
    * 判断类型，并输出XML，返回给微信服务器
    * @param  Object $obj
    * @return XML 
    */
    private function analysis($say){
        $request_data['info']   = $say;
        $request_data['userid'] = $_SESSION['__Turing_Chat__'];
        $back_data    = $this->curl_request( $this->to_api, $request_data );
        // 机器人发给用户的消息对象 
        $obj = simplexml_load_string($back_data, 'SimpleXMLElement', LIBXML_NOCDATA); 
        switch ($obj->MsgType) {
            //待填写部分
            case 'text':
                $contentStr=$obj->Content;
                $textTpl = "
                    <xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";
                $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, $this->time, $contentStr);
                echo $resultStr;
                exit();
            case 'news':
                $count=$obj->ArticleCount;
                     $textTpl = "
                        <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>$count</ArticleCount>
                        <Articles>
                        ";
                        $textTpl = sprintf($textTpl, $this->fromUsername, $this->toUsername, $this->time);
                    for($i=0;$i<$count;$i++){
                        $textTpl = $textTpl."
                        <item>
                        <Title><![CDATA[".$obj->Articles->item[$i]->Title."]]></Title>
                        <Description><![CDATA[详细信息]]></Description>
                        <PicUrl><![CDATA[".$obj->Articles->item[$i]->PicUrl."]]></PicUrl>
                        <Url><![CDATA[".$obj->Articles->item[$i]->Url."]]></Url>
                        </item>
                    ";
                    }
                     $textTpl = $textTpl."
                        </Articles>
                        </xml>
                        ";
                echo $textTpl;
                exit();
        }
    }
}

/*
    $content = '你叫什么名字';
    $fromUsername = '云天河';
    $toUsername ='潇涯';
    $time = time();
    new \Turing_Robot\Wechat($content,$fromUsername,$toUsername,$time);
*/