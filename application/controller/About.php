<?php
/**
* 关于我
*/
namespace app\controller;
use app\service\Article as ArticleService;
use think\Request;
use think\View;
class About{
	// View类，实例化对应对象
	protected $v;

	/**
	* 构造函数，前置操作
	* a.单例使用 View类
	* b.控制头部输出css
    * c.访问权限控制
	*/
	public function __construct(){
		$this->v  = new View;
		$action_name = Request::instance()->action();
	}

	// 析构函数，后置操作
	public function __destruct(){
	}


	// 登陆入口
    public function index(){
    	$serv = new ArticleService();
    	$info = $serv ->about();
    	$this->v->article 	= htmlspecialchars_decode(  $info['descript']  );
    	$this->v->pic 		= $info['pic'] ;
    	$this->v->seo_title = '关于我';
    	$this->v->seo_description = '关于云天河';
        echo $this->v->fetch('Index/header');
        echo $this->v->fetch('About/index');
        echo $this->v->fetch('Index/footer');
    }

    // 登陆后 单页面
    public function about_me(){
        echo $this->v->fetch('Others/about_site');
    }


 

}
