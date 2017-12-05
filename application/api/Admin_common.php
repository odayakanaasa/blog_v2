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
use Mine\Log;
use Mine\Location;
class Admin_common {

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+                    登陆入口
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	
	/**
   * @api {post} /Api?con=Admin_behaviour&act=login 登陆入口
   * @apiName login
   * @apiGroup Admin_common
   *
   * @apiParam {string} name 帐号
   * @apiParam {string} pwd 密码
   *
   * @apiDescription  后台帐号登录
   *
   * @apiVersion 2.0.0
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   * {
   *      "status": true,
   *      "url": "",
   * }
   */
	public function login(){
		// 写入文本日志
		$ip   = Location::get_ip();
		$addr = Location::ip_location($ip);
		Log::out('Admin_common -> login',   3);
		Log::out('Login IP   '. $ip,   3);
		Log::out('Login Addr '. $addr, 3);
		// 验证码验证
		Slide::instance(3); 
		// 数据过滤
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['name'],
			$p['pwd']
		]);
		// 解密数据
		$name = Admin::crypt($p['name'], false);
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
		$data['pic'] = $_r[0]['pic'];
		$data['name']= $_r[0]['name'];
		$data['id']  = -1;
		$_SESSION['user'] = [];
		$_SESSION['user'] = $data;
		Log::out('登录成功 '. $addr, 2);
    // 输出结果
    if_modify( 1,'/Admin/hall' );
	}
}