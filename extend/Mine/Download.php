<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++   		资源分片下载，只支持静态调用
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
namespace Mine;
class Download{
	private function __construct(){}
	/**
	* 下载前的配置
	* @param Int   : buffer 分片读取资源，并且控制为每秒的下载速度
	*/
	private static $buffer = 1 * 1024 * 1024;
	/**
	* 执行下载任务
	* @param String : file_name　文件名
	* @param String : file_where 文件所在文件夹
	*/
	public static function work( $file_name , $file_where = "/download_source" ){
		header("Content-type:text/html;charset=utf-8"); 
		$file_name = iconv("utf-8","gb2312",$file_name); // 处理中文文件名
		$absolute_path = realpath( $_SERVER['DOCUMENT_ROOT']."/../".$file_where ); 
		$file_path = $absolute_path."/".$file_name; 
		// 文件存在与否 
		if(!file_exists($file_path)){ 
			echo "<html><head><title>资源下载</title><style>span{position:fixed;top:30%;margin: 0 auto;padding: auto;text-align: center;left:0;right: 0;}div{margin: 0;padding: 0;width: 100%;}h1{font-family: 'Microsoft YaHei';font-size: 40px;}	h5{font-family: 'Microsoft YaHei';font-size: 20px;}	body{margin:0;padding: 0;}	#container{margin:0;padding: 0;	width: 100%;height: 100%;color:#323232;}</style></head><body><div id='container'><img src='http://i1.piimg.com/567571/623496da96b9d178.jpg' width='100%' height='100%'><span><h2><font color='#393d48'>暂时无法提供相关</font> <font color='#5fb878'>$file_name</font> 的资源</font><font color='#009688'></font><br><font color='#01aaed'>请先联系管理员</font> <font color='#ff572'>对此我们表示诚挚的歉意</font></h2></span></div></body></html>";
			exit();
		} 
		$fp = fopen($file_path,"r"); 
		$file_size = filesize($file_path); 
		// 下载文件需要用到的头 
		header("Content-type: application/octet-stream"); 
		header("Accept-Ranges: bytes"); 
		header("Accept-Length:".$file_size); 
		header("Content-Disposition: attachment; filename=".$file_name); 
		// 记录读取的，起始位置
		$file_count = 0; 
		// 向浏览器返回数据 
		while(!feof($fp) && $file_count<$file_size){
			$file_con 	 = fread( $fp , self::$buffer ); 
			$file_count += self::$buffer; 
			echo $file_con; //输出资源
			sleep(1);
		}
		fclose($fp); //输出剩下的资源，并关闭资源
	}
}