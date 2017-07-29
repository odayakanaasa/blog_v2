<?php
/**
* 访客行为，查看
*/
namespace app\api;
use app\api\Admin;
use think\Request;
use think\Db;
use Mine\Filter;
use Mine\Page;
class Admin_behaviour extends Admin{

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+                    访问足迹
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/

	/**
	* [分页查看]
	* @param Get : to_page
	*/
	public function user_behaviour_info(){
		$p = new Page('
			Select *
			From `user_behaviour`
			Order By `time` Desc
			Limit ?,?
		',[]);
		$p->is_render = false;
		$d = $p->get_result();
		trans_json($d);
	}


	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+                    恶意ip
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	/**
	* [分页查看]
	* @param Get : to_page
	*/
	public function user_deny_ip_info(){
		$p = new Page('
			Select *
			From `user_deny_ip`
			Order By `time` DESC
			Limit ?,?
		',[]);
		$p->is_render = false;
		$d = $p->get_result();
		trans_json($d);
	}
	/**
	* [修改]
	* @param Post : ip,expire
	*/
	public function user_deny_ip_edit(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['ip'],
			$p['expire']
		]);
		$p['expire'] = Filter::int( $p['expire'] );
		Db::table('user_deny_ip')->update($p);
		if_modify(1);
	}

	/**
	* [删除]
	* @param Post : ip
	*/
	public function user_deny_ip_del(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id']
		]);
		Db::table('user_deny_ip')->delete($p['id']);
		if_modify(1);
	}

	/**
	* [添加] Post : ip,expire
	*/
	public function user_deny_ip_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['ip'],
			$p['expire']
		]);
		$p['time'] = time();
		Db::table('user_deny_ip')->insert($p);
		if_modify(1);
	}

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+                第三方用户一览
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	/**
	* [分页查看]
	* @param Get : to_page
	*/
	public function user_info(){
		$p = new Page('
			Select pic,name,type
			From `user`
			Order By `type` ASC,`name` ASC
			Limit ?,?
		',[]);
		$p->page_size = 20;
		$p->is_render = false;
		$d = $p->get_result();
		trans_json($d);
	}

}