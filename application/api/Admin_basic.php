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
	+                  帐号信息相关
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/

	/**
	* 注销
	* @param Get
	*/
	public function logout(){
		session_destroy();
		if_modify(1);
	}

	/**
	* [查看] [个人简介 与 回复头像]
	* @param Get
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
	* [修改] [帐号以及密码]  操作成功后需要重新登陆
	* @param POST  : name,new_pwd,re_pwd
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
		$name    = urldecode (  \Crypt\Rsa::decrypt($p['name'])  );
		$new_pwd = self::crypt($p['new_pwd']);  // 新密码
		$re_pwd  = self::crypt($p['re_pwd']); 	// 再次输入新密码，格式不作要求
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
	* [修改] [头像、个人简介]
	* @param POST  : info_pic,reply_pic,descript
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
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+                   友情链接
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	/**
	* [添加] 
	* @param POST  : title,url
	*/
	public function friend_link_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['title'],	// 站点名
			$p['url']		// 链接
		]);
		Db::table('friend_link')->insert($p);
		if_modify(1);
	}

	/**
	* [查看] 一次查看所有
	* @param Get
	*/
	public function friend_link_info(){
		$_res['info'] = Db::table('friend_link')->select();
		trans_json($_res);
	}

	/**
	* [修改] 
	* @param POST  : id,title,url
	*/
	public function friend_link_edit(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id'],		// 主键
			$p['title'],	// 站点名
			$p['url']		// 链接
		]);
		Db::table('friend_link')->update($p);
		if_modify(1);
	}

	/**
	* [删除]
	* @param POST  : id
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
	+                   背景主题
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	/**
	* [添加] 
	* @param POST  : url
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
	* [查看] 分页查看
	* @param Get : to_page
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
	* [修改] 
	* @param POST  : id,url
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
	* [删除]
	* @param POST  : id
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