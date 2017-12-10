<?php
/**
 * 后台管理台
 */
namespace app\controller;

use think\Request;
use think\View;

class Admin
{
    // View类，实例化对应对象
    protected $v;

    /**
     * 构造函数，前置操作
     * a.单例使用 View类
     * b.控制头部输出css
     * c.访问权限控制
     */
    public function __construct()
    {
        $this->v = new View;
        $action  = Request::instance()->action();
        'index' == $action ? true : self::auth();
    }

    // 输出html
    private function render_html($html_name)
    {
        echo $this->v->fetch('Admin/header');
        echo $this->v->fetch('Admin/' . $html_name);
        echo $this->v->fetch('Admin/footer');
    }

    /**
     * 权限控制 => 如果不是管理员就跳出去
     * @param Boolean 判断没有权限时的处理：false 直接跳转到欢迎页面，true 返回权限判断的布尔结果
     */
    private static function auth($if_return = false)
    {
        if (!isset($_SESSION['user']['id']) || -1 != $_SESSION['user']['id']) {
            if ($if_return) {
                return false;
            } else {
                header('Location:/Admin');
                exit();
            }

        }
        return true;
    }

    // 登陆入口
    public function index()
    {
        // 是否已经登陆
        if (self::auth(true)) {
            header('Location:/Admin/hall');
            exit();
        }
        echo $this->v->fetch('Admin/index');
    }

    // 后台主页面
    public function hall()
    {
        $this->render_html(__FUNCTION__);
    }
    // 博文 => 分类
    public function blog_category_list()
    {
        $this->render_html(__FUNCTION__);
    }
    // 博文 => 总览
    public function blog_text()
    {
        $this->render_html(__FUNCTION__);
    }
    // 博文 => 修改
    public function blog_text_edit()
    {
        $this->render_html(__FUNCTION__);
    }

    // 信息管理
    public function comment()
    {
        $this->render_html(__FUNCTION__);
    }
    // 用户一览
    public function user_info()
    {
        $this->render_html(__FUNCTION__);
    }

    // 行为查看
    public function user_behaviour()
    {
        $this->render_html(__FUNCTION__);
    }
    // 恶意ip
    public function user_deny_ip()
    {
        $this->render_html(__FUNCTION__);
    }

    // 基础配置 => 帐号信息相关
    public function basic_info()
    {
        $this->v->render_tpl = \Mine\Slide::instance();
        $this->render_html(__FUNCTION__);
    }
    // 基础配置 => 友情链接
    public function friend_link()
    {
        $this->render_html(__FUNCTION__);
    }
    // 基础配置 => 背景图片
    public function background_list()
    {
        $this->render_html(__FUNCTION__);
    }
}
