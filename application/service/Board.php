<?php
namespace app\service;
use think\Db;
class Board{
	// 取最新的7条留言，其他的都异步拉取
	public function index (){
		// 参数 
			// 计算文章，统计评论
			$p = new \Mine\Page('
				Select  a.`time`, a.`content`, 
						c.`name`, c.`pic` , c.`type`
				From `blog_comment` as a 
				Left Join `blog_text` as b 
				On b.`id` = a.`article_id`
				Inner Join `user` as c 
				On c.`id`= a.`user_id`
				where a.`article_id`=0
				Order By a.`id` Desc
				Limit ?,?
			',[ ]);
			$p->page_size = 10;
			$p->is_render = false;
		return $p->get_result();
	}

}
