<?php
/**
* Editor编辑权限
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
Class Editor{
	/**
	* 图片接口
	* @param POST  : post_num
	* @echo String : 输出相关信息
	*/
    public function pic(){
        $up = new \Mine\Editor();
		$up->ser = ROOT_PATH.'/public';
		$up->run();
    }
}