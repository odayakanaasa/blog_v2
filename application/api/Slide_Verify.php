<?php
/*
$msg['status'] = false; // 是否需要重新请求验证码，默认否
$msg['Err'] = 1004;     // 错误编码
$msg['out'] ;           // 编码对应输出
*/
namespace app\api;
use Mine\Slide;
class Slide_Verify {
  
  /**
   * @api {get} /Api?con=Slide_Verify&act=init 初始获取 验证码
   * @apiName init
   * @apiGroup Slide_Verify
   *
   * @apiVersion 2.0.0
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   *
   * 验证码的html字符串
   *
   */
  public function init(){
    echo Slide::instance();
  }

  /**
   * @api {get} /Api?con=Slide_Verify&act=captchar 获取验证码的html
   * @apiName captchar
   * @apiGroup Slide_Verify
   *
   * @apiDescription  该html里面有待验证的base64数据的图片
   *
   * @apiVersion 2.0.0
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   *
   * html字符串
   *
   */
  public function captchar(){
    echo Slide::instance(1);
  }

  /**
   * @api {get} /Api?con=Slide_Verify&act=check 验证码，校验
   * @apiName check
   * @apiGroup Slide_Verify
   *
   * @apiVersion 2.0.0
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   * {
   *   "Err": "",
   *   "out":"",
   *   "status":""
   * }
   */
  public function check(){
    // 参数过滤
    Slide::instance(2);
  }
  

  // 示例验证 [RSA版]，示例：
  public function demo_rsa(){
    // 先验证
      // 若不通过，程序会结束，并输出对应返回信息，告诉前端，需要重新获取验证码
    Slide::instance(3); 
      // 通过，程序则继续执行
        // RSA 解密 、 [使用了加密函数的，都需要 urldecode 再次解码]
    $name = urldecode(   \Crypt\Rsa::decrypt($_POST['name'])  );
    $pwd  = urldecode(   \Crypt\Rsa::decrypt($_POST['pwd'])   );
      // 待验证的 帐号与密码
    $user_account = 'admin';
    $password = '123123';
    if( $name==$user_account &&  $pwd==$password ){
      // 验证成功时，一定要返回  {"status":true} 
      $msg['status']  = true;
        // 若验证成功后需要跳转到某个地址 {"status":true,"url":"/"} 形式输出
      $msg['url']   = '/';
      exit( json_encode($msg)  );
    }else{
      // 需要用户重新输入的时候，一定要返回  {"status":false} 
      $msg['status']  = false; 
      // 提示用户的错误信息，请以 {"status":false,"out":"这里是错误信息"} 形式输出
      $msg['out'] = '帐号或者密码不正确哟';
      exit( json_encode($msg)  );
    }
  }

}