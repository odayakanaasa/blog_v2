<?php
/**
* 管理员接口 基类，用户输入部分，需要xss过滤
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
Class Common_reply{

	// 登陆检测
	public function check_auth(){
		if(  !isset($_SESSION['user']['id'])  ){
			$msg['Err'] = '1014';
			trans_json($msg);
		}
		return $p['user_id'] = $_SESSION['user']['id'];
	}

	/**
	* [添加] 主楼
	* @param POST  : article_id,content
	*/
	public function comment_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['article_id'],	// 文章号 ，但 0=> 留言
			$p['content']		// 内容
		]);
		$article_id = intval($p['article_id']);
		// 登陆检测
		$p['user_id'] = $this->check_auth();

		// 普通文章？
		if(  0!=$article_id  ){
			// 文章存在？
			$_res = Db::query('
				Select `id`
				From `blog_text`
				Where `id`=?
			',[ $article_id ]);
			if( !count($_res) ){
				$msg['Err'] = '1004';
				trans_json($msg);
			}
		}
		// XSS过滤
		$p['content'] = \HTMLPurifier\Main::run($p['content']);
		// 录入
		Db::table('blog_comment')->insert($p);
		if_modify(1);
	}

	/**
	* [分页查看] 主楼
	* @param Get : to_page,article_id
	*/
	public function comment_info(){
		$g = Request::instance()->get();
		@Filter::is_set([
			$g['article_id']
		]);
		$p = new \Mine\Page('
			Select a.`id`, a.`time`, a.`content`, b.`name`, b.`type`, b.`pic` 
			From `blog_comment` as a 
			Inner Join `user` as b 
			On b.`id`=a.`user_id`
			Where a.`article_id`=?
			Order By a.`id` Desc 
			Limit ?,?
		',[ $g['article_id'] ]);
		$p->page_size = 10;
		$p->is_render = false;
		$d = $p->get_result();
		trans_json($d);
	}

	/**
	* [添加] 楼中楼
	* @param POST  : floor_id,content
	*/
	public function reply_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['floor_id'],		// 文章号 ，但 0=> 留言
			$p['content']		// 内容
		]);
		$floor_id = &$p['floor_id'];
		// 登陆检测
		$p['user_id'] = $this->check_auth();
		// 楼层存在？
		$_res = Db::query('
			Select `id`
			From `blog_comment`
			Where `id`=?
		',[ $floor_id ]);
		if( !count($_res) ){
			$msg['Err'] = '1004';
			trans_json($msg);
		}
		// 过滤
		$p['content'] = \HTMLPurifier\Main::run($p['content']);
		// 录入
		Db::table('blog_comment_reply')->insert($p);
		if_modify(1);
	}

	/**
	* [分页查看] 楼中楼
	* @param Get : to_page,floor_id
	*/
	public function reply_info(){
		$g = Request::instance()->get();
		@Filter::is_set([
			$g['floor_id']
		]);
		$p = new \Mine\Page('
			Select a.`id`, a.`time`, a.`content`, b.`name`, b.`type`, b.`pic` 
			From `blog_comment_reply` as a 
			Inner Join `user` as b 
			On b.`id`=a.`user_id`
			Where a.`floor_id`=?
			Order By a.`id`  
			Limit ?,?
		',[ $g['floor_id'] ]);
		$p->page_size = 4;
		$p->is_render = false;
		$d = $p->get_result();
		trans_json($d);
	}


}
