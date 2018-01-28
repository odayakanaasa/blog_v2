<?php
/**
 * 文章详情
 */
namespace app\controller;

use app\service\Article as ArticleService;
use think\View;

class Article
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
     * @param  Array  : param  数组方式传参到函数
     * @param  String : module_suffix 模块名后缀
     */
    protected function render_html($func_name = '', $param = false, $module_suffix = '')
    {
        $ser                  = new ArticleService();
        $this->v->module_name = $func_name . $module_suffix;
        if ('array' === gettype($param)) {
            $info = $ser->$func_name($param);
        } else {
            $info = $ser->$func_name();
        }
        $this->v->info         = $info;
        $this->v->seo_title    = $info['article_info'][0]['title'];
        $this->v->seo_keywords = $info['article_info'][0]['title'] . ',云天河,云天河博客,云天河Blog,全栈';
        $this->v->seo_description = '云天河在这篇文章主要阐述了' .$info['article_info'][0]['descript']. '的相关内容';
        echo $this->v->fetch('Index/header');
        echo $this->v->fetch('Article/' . $func_name);
        echo $this->v->fetch('Index/header_right_sidebar');
        echo $this->v->fetch('Index/footer');
    }

    /**
     * 文章渲染
     * @param refs_value 路由获取到的值
     */
    public function index($id)
    {
        $g['id'] = $id;
        $this->render_html(__FUNCTION__, $g);
    }

}
