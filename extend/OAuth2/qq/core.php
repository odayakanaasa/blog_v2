<?php
define("QQ_ROOT",dirname(__FILE__)."/");
require_once(QQ_ROOT."Curl.class.php");
require_once(QQ_ROOT."ErrorCase.class.php");
require_once(QQ_ROOT."Oauth.class.php");
require_once(QQ_ROOT."QC.class.php");
require_once(QQ_ROOT."Recorder.class.php");
require_once(QQ_ROOT."URL.class.php");

Class Oauth_API{
	/**
	* 返回登陆信息
	* @return Array
	*/
	public function get_info(){
		$qc = new QC();
		$acs = $qc->qq_callback();
		$uid = $qc->get_openid();
		$qc = new QC($acs,$uid);
		$user_info = $qc->get_user_info();
		$user_info['uid'] = $uid;
		// 清除 csrf_token;
		unset( $_SESSION['QC_userData'] );
		return $user_info;
	}

	/**
	* 第三方登陆地址
	* @return String
	*/
	public function to_url(){
		$qc = new \QC();
		return $qc->qq_login();
	}

}
/* 来自  云天河Blog  http://hlzblog.top/ 
* 示例返回

Array
(
	[uid] => 用户在该站点的OpenId [32位]
    [ret] => 0
    [msg] => 
    [is_lost] => 0
    [nickname] => 潇涯
    [gender] => 男
    [province] => 
    [city] => 
    [year] => 1996
    [figureurl] => http://qzapp.qlogo.cn/qzapp/101309589/51B58D13A4392ED7ADF6F683A8FAA2ED/30
    [figureurl_1] => http://qzapp.qlogo.cn/qzapp/101309589/51B58D13A4392ED7ADF6F683A8FAA2ED/50
    [figureurl_2] => http://qzapp.qlogo.cn/qzapp/101309589/51B58D13A4392ED7ADF6F683A8FAA2ED/100
    [figureurl_qq_1] => http://q.qlogo.cn/qqapp/101309589/51B58D13A4392ED7ADF6F683A8FAA2ED/40
    [figureurl_qq_2] => http://q.qlogo.cn/qqapp/101309589/51B58D13A4392ED7ADF6F683A8FAA2ED/100
    [is_yellow_vip] => 1
    [vip] => 1
    [yellow_vip_level] => 7
    [level] => 7
    [is_yellow_year_vip] => 0
)


*/