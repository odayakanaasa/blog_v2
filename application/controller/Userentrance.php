<?php
/**
 * 第三方登录入口，重定向 与 回调 => ok
 */
namespace app\controller;

use OAuth2\Entrance;
use think\Db;

class Userentrance
{
    /**
     * 私有参数
     * @param String : type  第三方简称
     * @param Array  : field 当前回调所需字段
     * @param String : url   最终跳转地址
     * @param String : user_center_url   回调跳转地址，默认跳转到 首页
     * @param Array  : third_type  第三方名称，对应数据库中编号 => 此举是因为整型分类索引更快
     */
    private $type;
    private $field;
    private $url               = '';
    private $user_center_url   = '/';
    private static $third_type = [
        "sina" => 1,
        "qq"   => 2,
    ];

    /**
     * 析构函数：统一，获取数据
     *   失败 => 跳转到普通登录页面 [一般由，直接访问该回调页面导致]
     *   成功 => 记录登录类型等信息
     */
    public function __destruct()
    {
        // 处理回调？
        if ('' == $this->url) {
            $this->handle_callback();
        }
        // 调至第三方页面之前的操作
        else {
            $_SESSION['to_url'] = $this->user_center_url;
            // 如果 referer被记录下来了，则跳转到之前的链接
            if (isset($_SERVER['HTTP_REFERER']) && '' != $_SERVER['HTTP_REFERER']) {
                $_SESSION['to_url'] = $_SERVER['HTTP_REFERER'];
            }
        }
        // 执行跳转
        header('Location:' . $this->url);
        exit();
    }

    // 处理回调
    private function handle_callback()
    {
        // 约束字段，配置情况？
        if (!isset($this->field['id']) || !isset($this->field['pic']) || !isset($this->field['name'])) {
            exit('缺少字段，配置所需：id、pic、name');
        }
        $data = Entrance::run($this->type, 2); // 待处理的用户回调数据
        // 有数据？
        if (!empty($data)) {
            // 解析数据，并录入登陆信息
            $valide_info = [
                'id'   => $data[$this->field['id']],
                'pic'  => $data[$this->field['pic']],
                'name' => $data[$this->field['name']],
                'type' => self::$third_type[$this->type],
            ];
            // 依据数据是否存在，更新或添加
            $_res = Db::query('
                Select `id`
                From `user`
                Where `id`=?
            ', [$valide_info['id']]);
            if (count($_res)) {
                Db::table('user')->update($valide_info);
            } else {
                Db::table('user')->insert($valide_info);
            }
            // 记录登录状态
            $_SESSION['user'] = $valide_info;
        }
        // 跳转到登陆前的页面
        $this->url = $_SESSION['to_url'];
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                   跳向第三方
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    public function redirect()
    {
        if (isset($_GET['gateway'])) {
            $this->url = Entrance::run($_GET['gateway']);
        }
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +               来自第三方的回调
    +       字段规定： id、pic[至少100x100]、name
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    // Sina
    public function from_sina()
    {
        $this->type  = 'sina';
        $this->field = [
            "id"   => "id",
            "name" => "name",
            "pic"  => "avatar_large",
        ];
    }

    // QQ
    public function from_qq()
    {
        $this->type  = 'qq';
        $this->field = [
            "id"   => "uid",
            "name" => "nickname",
            "pic"  => "figureurl_qq_2",
        ];
    }

}
