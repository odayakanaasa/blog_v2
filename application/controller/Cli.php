<?php
/**
* CLI模式执行，用于shell定时任务
*/
// 用法示例： php ../public/index.php Cli/check_order
namespace app\controller;
use think\View;
use think\Request;

class Cli{
	// ~~~~~~~test~~~~~~~
	public function run_bat(){
		echo PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;
		$class_names = get_class_methods( __CLASS__ );
		$not_require = [
			'__construct',
			'__destruct',
			__FUNCTION__
		];
		$class_names = array_diff($class_names, $not_require);
		foreach ($class_names as $k => $v) {
			echo 'Func: '.$v.PHP_EOL;
			$this->$v();
			echo PHP_EOL.PHP_EOL;
		}
	}

	// 构造函数
	public function __construct(){
		// Clis模式才能运行
		if(  !preg_match('/cli/i', php_sapi_name() )  ){
			header("Location: /404.html");
			exit();
		}
	}
	// 析构函数
	public function __destruct(){
        print(PHP_EOL."Time: ".date("Y/m/d H:m:s").PHP_EOL );
	}

    // [每天凌晨0点] 生成sitemap.xml
    public function sitemap(){
        $Sitemap = new \app\logic\cli_sitemap();
        $Sitemap->run();
        print("Sitemap created." );
    }



}
