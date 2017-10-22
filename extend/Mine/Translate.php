<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++  百度翻译接口 Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 用法、支持的语种 代码见文末，见文末
namespace Mine;
use Mine\CurlRequest;
class Translate {
    /**
     * 翻译内容
     * @param String content 要翻译的文本
     * @param String from 文本语种 默认:自动检测
     * @param String to 目标语种 默认:自动检测
     * @return  成功:String | 失败:(Boolean)false
     */
    public static function run($content, $from = 'auto', $to = 'auto') {
        $url = "http://fanyi.baidu.com/v2transapi";
        $data = array( 'from' => $from, 'to' => $to, 'query' => $content );
        $header = array(
            'Referer:http://fanyi.baidu.com/translate?aldtype=16047&query=asd%0D%0A%0D%0A&keyfrom=baidu&smartresult=dict&lang=auto2zh',
            'User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.221 Safari/537.36 SE 2.X MetaSr 1.0',
            'Origin:http://fanyi.baidu.com'
        );
        $back_info = CurlRequest::run( $url, $data, $header );
        $back_info = json_decode($back_info, true);
        if (isset($back_info['error'])) {
            return false;
        }
        return  $back_info['trans_result']['data']['0']['dst'];
    }


}
/*
供选择的语种 [
    'auto' => '自动检测',
    'ara' => '阿拉伯语',
    'de' => '德语',
    'ru' => '俄语',
    'fra' => '法语',
    'kor' => '韩语',
    'nl' => '荷兰语',
    'pt' => '葡萄牙语',
    'jp' => '日语',
    'th' => '泰语',
    'wyw' => '文言文',
    'spa' => '西班牙语',
    'el' => '希腊语',
    'it' => '意大利语',
    'en' => '英语',
    'yue' => '粤语',
    'zh' => '中文'
];

使用示例 :
$content = '我会一直爱你';
$result = \Mine\Translate::run($content, 'auto'); 
echo $result;
*/