<?php
/**
 * 首页
 */
namespace app\controller;

use app\service\Index as IndexService;
use think\Request;
use think\View;

class Index
{
    // View类，实例化对应对象
    private $v;

    // 构造函数
    public function __construct()
    {
        $this->v = new View;
    }

    /**
     * 统一请求
     * @param  String : func_name 模块名
     * @param  String : name   Seo title名字
     * @param  Array  : param  数组方式传参到函数
     * @param  String : module_suffix 模块名后缀
     */
    protected function render_html($func_name = '', $name, $param = false, $module_suffix = '')
    {
        $ser                  = new IndexService();
        $this->v->module_name = $func_name . $module_suffix;
        $this->v->seo_title   = $name;
        if ('array' === gettype($param)) {
            $this->v->info = $ser->$func_name($param);
        } else {
            $this->v->info = $ser->$func_name();
        }
        echo $this->v->fetch('Index/header');
        echo $this->v->fetch('Index/' . $func_name);
        echo $this->v->fetch('Index/footer');
    }

    // 博客首页
    public function index()
    {
        $g                        = Request::instance()->get();
        $this->v->seo_description = '云天河Blog(www.hlzblog.top)，致力于全栈开发技术的交流与资源共享。欢迎加入QQ群399073936，一起更进一步。';
        $this->v->seo_keywords    = '云天河,云天河博客,云天河Blog,hlzblog,hlz';
        $this->render_html(__FUNCTION__, '云天河', $g);
    }
}
