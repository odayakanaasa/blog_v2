<?php
/**
 * 特效页
 */
namespace app\controller;

use app\service\Board as BoardService;
use think\View;

class Board
{
    // View类，实例化对应对象
    protected $v;
    // 构造函数
    public function __construct()
    {
        $this->v = new View;
    }
    // 大事记
    public function index()
    {
        $page                     = new BoardService();
        $this->v->page            = $page->index();
        $this->v->seo_title       = '留言板';
        $this->v->seo_description = '留言给天河';
        echo $this->v->fetch('Index/header');
        echo $this->v->fetch('Board/' . __FUNCTION__);
        echo $this->v->fetch('Index/header_right_sidebar');
        echo $this->v->fetch('Index/footer');
    }
}
