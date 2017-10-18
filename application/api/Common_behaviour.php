<?php
/**
* 访客行为，添加
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
class Common_behaviour{
	public function __construct(){
		// 如果是博主，不继续进行
		if(  isset($_SESSION['user']['id'])  &&  -1 == $_SESSION['user']['id']  ){
			exit();
		}
	}

	/**
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	+              访问足迹【只记录View层】
	++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	/**
	* [添加]
	* @param POST : url
	*/
	public function user_behaviour_add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['url']	// 用户访问的地址
		]);
		$p['ip'] = \Mine\Location::get_ip();
		$p['location'] = \Mine\Location::ip_location($p['ip']);
		Db::table('user_behaviour')->insert($p);
		if(  preg_match('/Article(.*)\?id=(\d+)/i', $p['url'], $match)  ){
			$this->article_statistic($match[1]);
		}
		if_modify(1);
	}

	// 如果url是文章的url，则文章阅读量增1

	private function article_statistic($article_id){
		Db::execute('
			Update `blog_text`
			Set `statistic` = `statistic`+1
			Where `id`=?
		',[ $article_id ]);
	}

}