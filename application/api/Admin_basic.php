<?php
/**
* 管理员操作
*/
namespace app\api;
use app\api\Admin;
use think\Request;
use think\Db;
use Mine\Filter;
use Mine\Slide;
Class Admin_basic extends Admin{
	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+	 	 	 	 	 	 帐号信息相关
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/

	/**
	 * @api {get} /Api?con=Admin_basic&act=logout 注销
	 * @apiName logout
	 * @apiGroup Admin_basic
	 *
	 * @apiDescription  管理员注销
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function logout(){
		session_destroy();
		if_modify(1);
	}

	/**
	 * @api {get} /Api?con=Admin_basic&act=basic_info 个人信息：查看
	 * @apiName basic_info
	 * @apiGroup Admin_basic
	 *
	 * @apiDescription  查看已设置的：个人简介、回复头像...
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 "info_pic": "",
	 *	 "reply_pic": "",
	 *	 "descript": "",
	 *	 "name": "",
	 * }
	 */
	public function basic_info(){
		$_r1 = Db::query('
			Select `descript`,`pic`,`name`
			From `admin_basic`
		');
		$_r2 = Db::query('
			Select `pic`
			From `user`
			Where `id` = -1
		');
		$msg['info_pic']  = $_r1[0]['pic'];
		$msg['reply_pic'] = $_r2[0]['pic'];
		$msg['descript']  = htmlspecialchars_decode($_r1[0]['descript']);
		$msg['name'] = $_r1[0]['name'];
		trans_json($msg);
	}

	/**
	 * @api {post} /Api?con=Admin_basic&act=pwd_edit 个人信息：修改
	 * @apiName pwd_edit
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} name 新的帐号名
	 * @apiParam {string} new_pwd 新密码
	 * @apiParam {string} re_pwd 再次输入新密码，格式不作要求
	 *
	 * @apiDescription  修改头像、个人简介
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function basic_edit(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['info_pic'],
			$p['reply_pic'],
			$p['descript']
		]);
		$info_pic  = &$p['info_pic']; 	// 展示头像地址 200x200
		$reply_pic = &$p['reply_pic'];	// 回复头像地址 100x100
		$descript  = &$p['descript'];	// 个人简介 Editor内容
		Filter::is_empty($info_pic,'请输入展示头像地址');
		Filter::is_empty($reply_pic,'请输入回复头像地址');
		Filter::is_empty($descript,'请输入个人简介');
		Db::execute('
			Update `admin_basic`
			Set `pic`=?, `descript`=?
		',[ $info_pic, $descript ]);
		Db::execute('
			Update `user`
			Set `pic`=?
			Where `id`= ?
		',[ $reply_pic, '-1' ]);
		if_modify(1);
	}

	/**
	 * @api {post} /Api?con=Admin_basic&act=pwd_edit 帐号以及密码:修改
	 * @apiName pwd_edit
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} name 新的帐号名
	 * @apiParam {string} new_pwd 新密码
	 * @apiParam {string} re_pwd 再次输入新密码，格式不作要求
	 *
	 * @apiDescription  修改帐号以及密码，操作成功后需要重新登陆
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function pwd_edit(){
		// 验证码验证
		Slide::instance(3); 
		// 数据验证
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['new_pwd'],
			$p['re_pwd'],
			$p['name']
		]);
		$name	  = urldecode (  \Crypt\Rsa::decrypt($p['name'])  );
		$new_pwd = self::crypt($p['new_pwd']); 
		$re_pwd  = self::crypt($p['re_pwd']);
		// 过滤
		if(  $new_pwd != $re_pwd  ){
			$msg['status'] = false;
			$msg['out'] = '新密码，两次的输入不一致';
			trans_json($msg);
		}
		Db::execute('
			Update `admin_basic`
			Set `pwd`=?,`name`=?
		',[ $new_pwd, $name ]);
		// 需要重新登陆
		$this->logout();
	}
	

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+	 	 	 	 	 	  友情链接
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/

	/**
	 * @api {post} /Api?con=Admin_basic&act=friend_link_add 友情链接：添加
	 * @apiName friend_link_add
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} title 站点名称
	 * @apiParam {string} url 站点地址
	 *
	 * @apiDescription  添加友情链接
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function friend_link_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['title'],
			$p['url']	
		]);
		Db::table('friend_link')->insert($p);
		if_modify(1);
	}

	/**
	 * @api {get} /Api?con=Admin_basic&act=friend_link_info 友情链接：查看
	 * @apiName friend_link_info
	 * @apiGroup Admin_basic
	 *
	 * @apiDescription  一次查看所有友情链接地址
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 "info": [{
	 *	   "id": "",
	 *	   "title": "",
	 *	   "url": "",
	 *	 }, ...]
	 * }
	 */
	public function friend_link_info(){
		$_res['info'] = Db::table('friend_link')->select();
		trans_json($_res);
	}

	/**
	 * @api {post} /Api?con=Admin_basic&act=friend_link_edit 友情链接：修改
	 * @apiName friend_link_edit
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} id 主键
	 * @apiParam {string} title 站点名
	 * @apiParam {string} url 链接
	 *
	 * @apiDescription  友情链接相关信息修改
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function friend_link_edit(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id'],	
			$p['title'],	
			$p['url']	
		]);
		Db::table('friend_link')->update($p);
		if_modify(1);
	}

	/**
	 * @api {post} /Api?con=Admin_basic&act=friend_link_del 友情链接：删除
	 * @apiName friend_link_del
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} id 主键
	 *
	 * @apiDescription  删除某个友情链接
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function friend_link_del(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id']		// 主键
		]);
		Db::table('friend_link')->delete($p['id']);
		if_modify(1);
	}

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+	 	 	 	 	 	  背景主题
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/

	/**
	 * @api {post} /Api?con=Admin_basic&act=background_list_add 背景主题：添加
	 * @apiName background_list_add
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} url 图片地址
	 *
	 * @apiDescription  添加背景主题
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function background_list_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['url']
		]);
		Db::table('background_list')->insert($p);
		if_modify(1);
	}

	/**
	 * @api {get} /Api?con=Admin_basic&act=background_list_info 背景主题：分页查看
	 * @apiName background_list_info
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} to_page 页码，默认值为1
	 *
	 * @apiDescription  获取背景主题数据
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 "info": [{
	 *	   "id": "",
	 *	   "url": "",
	 *	 }, ...],
	 *	 "page_count": "",
	 *	 "total": ""
	 * }
	 */
	public function background_list_info(){
		$p = new \Mine\Page('
			Select * 
			From `background_list`
			Order By `id` Desc
			Limit ?,?
		',[]);
		$p->page_size = 9;
		$p->is_render = false;
		  $d = $p->get_result();
		trans_json($d);
	}

	/**
	 * @api {post} /Api?con=Admin_basic&act=background_list_add 背景主题：修改
	 * @apiName background_list_add
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} id 主键
	 * @apiParam {string} url 图片地址
	 *
	 * @apiDescription  修改背景主题
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function background_list_edit(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id'],		// 主键
			$p['url']
		]);
		Db::table('background_list')->update($p);
		if_modify(1);
	}

	/**
	 * @api {post} /Api?con=Admin_basic&act=background_list_del 背景主题：删除
	 * @apiName background_list_del
	 * @apiGroup Admin_basic
	 *
	 * @apiParam {string} id 主键
	 *
	 * @apiDescription  删除某个背景主题
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	 	 "status": true
	 * }
	 */
	public function background_list_del(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id'],		// 主键
		]);
		Db::table('background_list')->delete($p['id']);
		if_modify(1);
	}


}