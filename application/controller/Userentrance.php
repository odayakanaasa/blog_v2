<?php
/**
* 第三方登录入口，重定向 与 回调 => ok
*/
namespace app\controller;
class Userentrance{
    /**
    * 私有参数
    * @param  Array  : data  待处理的用户回调数据
    * @param  String : type  第三方简称
    * @param  Array  : field 当前回调所需字段
    * @param  String : url   最终跳转地址
    * @param  String : user_center_url   回调跳转地址，默认跳转到 首页
    */
    private $data;
    private $type;
    private $field;
    private $url = '/Blog';
    private $user_center_url ='/';

    /**
    * 析构函数：统一，获取数据
    *   失败 => 跳转到普通登录页面 [一般由，直接访问该回调页面导致]
    *   成功 => 记录登录类型等信息
    */
    public function __destruct(){
        // 处理回调？
        if(  '/Blog' == $this->url  ){
            // 约束字段，配置情况？
            if(  !isset($this->field['id']) || !isset($this->field['pic']) || !isset($this->field['name']) ){
                exit('缺少字段，配置所需：id、pic、name');
            }
            $this->data = \OAuth2\Entrance::run( $this->type, 2 );
            // 有数据？
            if(  !empty( $this->data )  ){
                if( $this->type == 'qq' ){
                    $this->type=2;
                }
                else if ( $this->type == 'sina' ){
                    $this->type=1;
                }
                // 解析数据，并录入登陆信息
                $_SESSION['user']['id']   = $this->data[ $this->field['id']  ];
                $_SESSION['user']['type'] = $this->type;
                $_SESSION['user']['pic' ] = $this->data[ $this->field['pic']  ];
                $_SESSION['user']['name'] = $this->data[ $this->field['name'] ];
                // 依据数据存在性，更新或添加
                $_res = \think\Db::query('
                    Select `id`
                    From `user`
                    Where `id`=?
                ',[ $_SESSION['user']['id'] ]);
                if( count($_res)  ){
                    \think\Db::table('user')->update($_SESSION['user']);
                }else{
                    \think\Db::table('user')->insert($_SESSION['user']);
                }
                // 跳转到登陆前的页面
                $this->url = $_SESSION['to_url'];
            }
        }else{
            // 记录登录前的链接
            $_SESSION['to_url'] = $this->user_center_url;
            // 如果 referer被记录下来了，则跳转到之前的链接
            if( isset($_SERVER['HTTP_REFERER']) && ''!=$_SERVER['HTTP_REFERER'] ){
                $_SESSION['to_url'] = $_SERVER['HTTP_REFERER'];
            }
        }
        // 执行跳转
        header('Location:'.$this->url);
        exit();
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                   跳向第三方
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    */

    // Sina
    public function to_sina(){
        $this->url = \OAuth2\Entrance::run('sina',1);
    }
    // QQ
    public function to_qq(){
        $this->url = \OAuth2\Entrance::run('qq',1);
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +               来自第三方的回调
    +       字段规定： id、pic[至少100x100]、name
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    */
    // Sina
    public function from_sina(){
        $this->type = 'sina';
        $this->field = [
            "id"    => "id" ,
            "name"  => "name" ,
            "pic"   => "avatar_large" 
        ];
    }

    // QQ
    public function from_qq(){
        $this->type = 'qq';
        $this->field = [
            "id"    => "uid" ,
            "name"  => "nickname" ,
            "pic"   => "figureurl_qq_2" 
        ];
    }

}
