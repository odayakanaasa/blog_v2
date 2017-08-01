<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++            Redis驱动，支持主从集群
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
/*
* 数据库 1 => 热数据
* 数据库 2 => 各种 token 
* 数据库 3 => 各种 缓数数据
*/
namespace Mine;
class yth_Redis{
	/**
	* 析构函数，单例模式
	*/
	private function __contruct(){}

	/**
	* @param Object : r 实例化redis对象
	*/
	public static $r;

	/**
	* 获取实例化的redis对象
	* @param int    : db 选择数据库，默认 => 2
	* @param Boolean: true=>获取 “主”服务器对象，false=>获取 “从”服务器对象，默认 => true
	* @return Object: “主”服务器对象
	*/
	public static function instance( $db = 2 , $Master_or_Salve = true ){
		$ini = config('Redis'); // 读取配置
		if( $Master_or_Salve ){
			$conf = self::get_obj( $ini['Master'] );
		}else{
			$conf = self::get_obj( $ini['Slave']  );
		}
		if( !self::$r ){
			self::$r = new \Redis();
			self::$r ->connect( $conf['host'], $conf['port'] );
			self::$r ->auth( $conf['auth'] );
			self::$r->select( $db );
		}
		return self::$r;
	}

	/**
	* 本次服务器较少，采用用随机算法
	* @param Array : 服务器配置信息
	* @return Json : 配置信息 
	*/
	public static function get_obj( $_config ){
		$num   = count( $_config );
		$which = mt_rand( 1, $num ) -1 ; // 随机选中一台
		return $_config[ $which ] ;
	}

	// Redis Session配置
	/*
	ini_set('session.save_handler', 'redis');
	ini_set('session.save_path', 'tcp://127.0.0.1:6379?auth=xxx');
	session_start();
	$_SESSION['sessionid'] = 'this is session content!';
	echo $_SESSION['sessionid'];
	echo '<br/>';

	$redis = new redis();
	$redis->connect('127.0.0.1', 6379);
	//redis用session_id作为key并且是以string的形式存储
	echo $redis->get('PHPREDIS_SESSION:' . session_id());
	*/

}

/*	数据格式
	// +----------------------------------------------------------------------
    // | instance()中的 $ini数据
    // +----------------------------------------------------------------------

    // 主要用于集群,同一个业务，部署在多个服务器上 
    'Redis' => [
        'Master'  =>  [
            // [
            //     "host" => "127.0.0.1",
            //     "port" =>  6379,
            //     "auth" => "zhangli"
            // ],
            [
                "host" => "115.159.56.128",
                "port" =>  6379,
                "auth" => "zhangli"
            ]
        ],
        'Slave'  =>  [
            [
                "host" => "123.206.211.133",
                "port" =>  6379,
                "auth" => "zhangli"
            ]
        ]
    ],
*/