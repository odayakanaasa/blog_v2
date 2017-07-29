<?php
/**
* 公共访问接口
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
class Common_basic{

	/**
	* [友情链接]
	* @param POST : url
	*/
	public function friend_link_info(){
		$_res['info'] = Db::table('friend_link')->select();
		trans_json($_res);
	}

	// 用户注销logout
	public function logout(){
		if( isset($_SESSION['user']['id']) ){
			$url = '/';
			session_destroy();
		}else{
			$url = '/404.html';
		}
		header('Location:'.$url);
		exit();
	}

}