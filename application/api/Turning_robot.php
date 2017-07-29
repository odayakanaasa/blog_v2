<?php
/**
* 图灵接口
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
Class Turning_robot{
	/**
	* 添加
	* @param POST  : (`urldecode`)text,option
	* @echo String : 输出相关信息
	*/
    public function index(){
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['text'],
            $p['option']
        ]);
        $text   = urldecode($p['text']);   //@post: 聊天内容
        $option = &$p['option']; //@post: 选项
        $api    = new \Turing_Robot\Api($text); 
        $msg['info'] =  $api->get_result($option) ;
        trans_json($msg);
    }
}