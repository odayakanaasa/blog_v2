<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//  Token身份生成与验证               Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
namespace Mine;

// 引入 云天河写的 Redis类
use Mine\Redis;

class Token
{

    /**
     * 随机生成固定长度的随机数
     * @param String  len  截取长度，默认八位
     * @param Int     type 返回类型 [1=>字母+数字,2=>纯数字,3=>纯字母]
     * @return String
     */
    public static function rand_str($len = 8, $type = 1)
    {
        switch ($type) {
            case 1:
                $str = "0123456789qwertyuiopasdfghjklzxcvbnm";
                break;
            case 2:
                $str = "0123456789";
                break;
            default:
                $str = "qwertyuiopasdfghjklzxcvbnm";
        }
        return substr(str_shuffle($str), 0, $len);
    }
    /**
     * 依据微秒来生成不同字符串
     * @return String 生成的 token
     */
    public static function rand_token()
    {
        return md5(microtime(true) . self::rand_str());
    }

    /**
     * 生成token
     * @param Int   uid    用户 uid
     * @param Int   expire 生命周期，默认 两小时
     * @return String 返回生成的token
     */
    public static function create_token($uid, $expire = 86400)
    {
        // 生成32位的随机数
        $token      = self::rand_token();
        $token_name = "tk_" . $uid;
        $token_life = time() + $expire;
        // 将$token存入redis中
        $r = Redis::instance();
        $r->pipeline()
            ->set($token_name, $token)
            ->expireAt($token_name, $token_life)
            ->Exec();
        return $token;
    }

    /**
     * 从cookie中获取token，并验证身份
     * @param Int    uid   用户 uid
     * @param String token 待验证的值
     * @return Boolean true=>通过 false=>拒绝
     */
    public static function check($uid)
    {
        $token = "tk_" . $uid;
        $r     = Redis::instance();
        $r->get('PHPREDIS_SESSION:' . session_id());
        // 从cookie中获取 token
        if ($r->exists($token)) {
            $token_real = unserialize($r->get($token));
        } else {
            return false;
        }
    }
}

/*
 * 示例：基础控制器，专为 token 验证设计
 */

// abstract class BaseController extends Controller {
//   protected $logic ;  // 临时逻辑对象
//   protected $token;   // 个人身份识别码
//   /**
//   * 获取传过来的  token  通过的，才能继续往下运行
//   */
//   public function __construct(){
//     parent::__construct();
//     $this->token_verify();
//   }
//   /**
//   * 检测 token是否有效
//   */
//   protected function token_verify(){
//     if( isset($_GET['token']) ){
//       $this->token = $_GET['token'] ;
//       if( null == $this->token() ){
//         $info['detail'] = 'Your token is invalid';
//         $info['code'] = 403;
//         exit( json_encode($info) );
//       }
//     }else{
//       $info['detail'] = 'Your token is invalid';
//       $info['code'] = 403;
//       exit( json_encode($info) );
//     }
//   }
//   /**
//   * CURD token中的数据
//   * @param Array data 为空时，返回token中的数据，否则更新数据到 token
//   */
//   protected function token($data=[]){
//     if( []==$data ){
//       return Token::get($this->token);
//     }else{
//       return Token::set($this->token, $data);
//     }
//   }
// }
