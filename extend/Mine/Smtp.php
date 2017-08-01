<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++            Smtp服务器
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
/** 示例:
$to='229270575@qq.com';
$title='来自云天河Blog的邮件';
$content= '<h2>云天河，你好棒啊！</h2>';
$status = \Mine\Smtp::send($to,$title,$content);
*/
namespace Mine;
class Smtp{
	private function __contruct(){} // 单例模式
	private static $_config ; 	// 配置信息
	private static $instance; 	// 实例化对象
	// 从数据库中，读取并返回配置信息
	public static function get_conf(){
		if( !self::$_config ){
			$r = \think\Db::query('
				Select *
				From `hlz_mail` 
				Order By Host
				Limit 1
			');
			$tpl = [
				//必填
				'Host'     => '', 	// 链接qq域名邮箱的服务器地址，	示例 smtp.163.com
				'FromName' => '', 	// 你的昵称
				'From' 	   => '', 	// smtp邮箱全称
				'Username' => '', 	// smtp邮箱帐号，如果是qq邮箱则是qq号，如果是163邮箱：除去@163.com的部分
				'Password' => '',	// smtp邮箱 授权码 cddbstebcoxgbhjc
				//选填 默认填上localhost
				'Hostname' => 'localhost'
			];
			self::$_config = array_merge( $tpl, $r[0] );
			self::$_config['Password'] = \Crypt\yth_crypt::decrypt( self::$_config['Password'] );
			return self::$_config;
		}
	}

	// 返回 实例化对象
	protected static function get_ins(){
		if ( !self::$instance ){
			self::get_conf();
			self::$instance = new \PHPMailer();
		}
		return self::$instance;
	}

	/**
	* 发送邮件方法
	* @param String : to  接收者 
	* @param String : title  标题 
	* @param html   : content  邮件内容
	* @return Boolean: true发送成功 | false发送失败
	*/
	public static function send($to,$title,$content){
		//引入自动加载函数
	    require_once realpath( dirname(__FILE__) .'/../Smtp/PHPMailerAutoload.php' );
	    //实例化PHPMailer核心类
	    $mail = self::get_ins();

	    //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
	    $mail->SMTPDebug = 0;
	    //使用smtp鉴权方式发送邮件
	    $mail->isSMTP();
	    //smtp需要鉴权 这个必须是true
	    $mail->SMTPAuth = true;
	    //链接qq域名邮箱的服务器地址
	    $mail->Host = self::$_config['Host'];
	    //设置使用ssl加密方式登录鉴权
	    $mail->SMTPSecure = 'ssl';
	    //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
	    $mail->Port = 465;
	    //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
	    $mail->Hostname = self::$_config['Hostname'] ? self::$_config['Hostname'] : 'localhost'  ;
	    //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
	    $mail->CharSet = 'UTF-8';
	    //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
	    $mail->FromName = self::$_config['FromName'];
	    //smtp登录的账号 这里填入字符串格式的qq号即可
	    $mail->Username = self::$_config['Username'];
	    //smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）
	    $mail->Password = self::$_config['Password'];
	    //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
	    $mail->From = self::$_config['From'];
	    //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
	    $mail->isHTML(true);
	    //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
	    $mail->addAddress($to,'云天河Blog | 实时通知');
	    //添加多个收件人 则多次调用方法即可
	    // $mail->addAddress('xxx@163.com','lsgo在线通知');
	    //添加该邮件的主题
	    $mail->Subject = $title;
	    //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
	    $mail->Body = $content;
	    //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
	    // $mail->addAttachment('./d.jpg','mm.jpg');
	    //同样该方法可以多次调用 上传多个附件
	    // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');
	    $status = $mail->send();
	    //简单的判断与提示信息
		return $status;
	}
	
}
