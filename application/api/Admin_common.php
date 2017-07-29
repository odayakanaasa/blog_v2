<?php
/**
* 管理员入口
*/
namespace app\api;
use app\api\Admin;
use think\Request;
use think\Db;
use Mine\Filter;
use Mine\Slide;
class Admin_common {

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+                    登陆入口
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	
	/**
	* 普通登陆
	* @param POST  : name,pwd 
	* @echo String : 状态
	*/
	public function login(){
		// // 验证码验证
		Slide::instance(3); 
		// // 数据过滤
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['name'],
			$p['pwd']
		]);
		// 解密数据
		$name = Admin::crypt($p['name'],false);
		$pwd  = Admin::crypt($p['pwd']);
		// 验证
		$_res = Db::query('
			Select `name`
			From `admin_basic`
			Where `name`=? And `pwd`=?
		',[ $name, $pwd ]);
		if( !count($_res) ){
			$msg['out'] = '帐号或者密码不正确';
			trans_json($msg);
		}
		$_r = Db::query('
			Select `name`,`pic`
			From `user`
			Where `id`=-1
		',[]);
		// 寻找管理员头像
		// 这次不写登陆日志了，-1默认 大V标志
		$_SESSION['user']['id']  = -1;
		$_SESSION['user']['pic'] = $_r[0]['pic'];
		$_SESSION['user']['name']= $_r[0]['name'];
        // 输出结果
        if_modify( 1,'/Admin/hall' );
	}
}