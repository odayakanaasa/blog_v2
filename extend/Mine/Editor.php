<?php
// 输出样式见文末
namespace Mine;
class Editor{
	// 配置信息
	public $file_name  = 'upfile'; // 上传文件的name字段名
	public $size_limit =   300 ;  	// 图片大小限制，单位KB
	public $ser = __DIR__;	// 入口文件路径
	public $dir = '/Uploads/editor/'; 		// 绝对路径的目录

	/**
	* 活动图片上传[单个上传]
	*/
	public function run(){
		// 大小限制
		$size = $this->size_limit * 1024;
		if( $_FILES[$this->file_name]['size'] > $size ){
			$data['state '] = 'error|图片不能大于'.$this->size_limit.'KB';
			exit( json_encode($data) );
		}
		// 类型限制
		switch ( $_FILES[$this->file_name]["type"] ) {
			case "image/gif"  :
				$suffix = '.gif'; 
				break;
			case "image/jpg"  :
			case "image/jpeg" :
			case "image/pjpeg":
				$suffix = '.jpg';
				break;
			case "image/png"  :
				$suffix = '.png';
				break;
			default:
				$data['state '] = 'error|文件类型错误！';
				exit( json_encode($data) );
		}
		// 从临时区，搬到站内
		$path   = $this->dir.date("Ymd").'_'.$this->acc_token(5).$suffix; // 绝对路径
		$t_path = $this->ser.$path; 			// [相对服务器路径] 临时存放位置
		move_uploaded_file(  $_FILES[$this->file_name]["tmp_name"], $t_path  );
		// 为了方便管理Cdn图片，在数据进入了数据库后，方能正式存入Cdn
		if( \Mine\Cdn::comeTrue($path) ){
			$path = \Mine\Cdn::$web_prefix.$path;
		}
		$data = array(
			"state" 	=> "SUCCESS",
			"url" 		=> $path,
			"title" 	=> "查看图片",
			"original"	=> "-"
		);
		exit( json_encode($data) );
	}


	/**
	  获取acc_token
	* @param String  : len 返回长度默认,八位token值
	* @param Int     : type 返回类型[1=>字母+数字,2=>纯数字,3=>纯字母]
	* @return String acc_token值
	*/
	public function acc_token( $len = 8 ,$type = 1){
	    switch ($type) {
	        case 1:
	            return substr( str_shuffle("0123456789qwertyuiopasdfghjklzxcvbnm") , 0 , $len  );
	        case 2:
	            return substr( str_shuffle("0123456789") , 0 , $len  );
	        default:
	            return substr( str_shuffle("qwertyuiopasdfghjklzxcvbnm") , 0 , $len  );
	    }   
	}

}
/* 输出格式
 上传成功，返回地址
	"http://xxx.com/imgs/abc.png"
 上传成功，返回格式如下
	"error|服务器端错误"

$up = new \Mine\Editor();
$up->ser = ROOT_PATH.'/public';
$up->run();

*/
