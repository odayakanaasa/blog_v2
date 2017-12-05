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
	 * @api {get} /Api?con=Admin_behaviour&act=user_behaviour_info 访问足迹：查看
	 * @apiName user_behaviour_info
	 * @apiGroup Admin_behaviour
	 *
	 * @apiParam {string} to_page 页码，默认值为1
	 *
	 * @apiDescription  分页查看访问足迹
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *   "info": [{
	 *     "ip": "",
	 *     "url": "",
	 *     "location": "",
	 *     "time": "",
	 *   }, ...],
	 *   "page_count": "",
	 *   "total": ""
	 * }
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
	 * @api {get} /Api?con=Admin_behaviour&act=user_deny_ip_info 恶意ip：查看
	 * @apiName user_deny_ip_info
	 * @apiGroup Admin_behaviour
	 *
	 * @apiParam {string} to_page 页码，默认值为1
	 *
	 * @apiDescription  分页查看恶意ip信息
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *   "info": [{
	 *     "ip": "",
	 *     "time": "",
	 *     "expire": "",
	 *   }, ...],
	 *   "page_count": "",
	 *   "total": ""
	 * }
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
	 * @api {post} /Api?con=Admin_behaviour&act=user_deny_ip_edit 恶意ip：修改
	 * @apiName user_deny_ip_edit
	 * @apiGroup Admin_behaviour
	 *
	 * @apiParam {string} ip ip地址
	 * @apiParam {string} expire 过期时间
	 *
	 * @apiDescription  修改对应ip的过期时间
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *      "status": true
	 *  }
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
	 * @api {post} /Api?con=Admin_behaviour&act=user_deny_ip_del 恶意ip：删除
	 * @apiName user_deny_ip_del
	 * @apiGroup Admin_behaviour
	 *
	 * @apiParam {string} ip ip地址
	 *
	 * @apiDescription  删除某个背景主题
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *      "status": true
	 *  }
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
	 * @api {post} /Api?con=Admin_behaviour&act=user_deny_ip_add 恶意ip：添加
	 * @apiName user_deny_ip_add
	 * @apiGroup Admin_behaviour
	 *
	 * @apiParam {string} ip ip地址
	 * @apiParam {string} expire 过期时间，单位秒
	 *
	 * @apiDescription  删除某个背景主题
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *      "status": true
	 *  }
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
	 * @api {get} /Api?con=Admin_behaviour&act=user_info 第三方用户：查看
	 * @apiName user_info
	 * @apiGroup Admin_behaviour
	 *
	 * @apiParam {string} to_page 页码，默认值为1
	 *
	 * @apiDescription  分页查看第三方用户信息
	 *
	 * @apiVersion 2.0.0
	 * @apiSuccessExample Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *   "info": [{
	 *     "pic": "",
	 *     "name": "",
	 *     "type": "",
	 *   }, ...],
	 *   "page_count": "",
	 *   "total": ""
	 * }
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