<?php
namespace HTMLPurifier;
Class Main{
	/**
	* 过滤富文本的XSS
	* @param  String 待过滤的HTML
	* @return 返回过滤后的文本
	*/
	public static function run( $dirty_html ){
		require __DIR__.'/HTMLPurifier.auto.php';
		$config = \HTMLPurifier_Config::createDefault();
	    $purifier = new \HTMLPurifier($config);
	    $clean_html = $purifier->purify($dirty_html);
	    return $clean_html;
	}
}
