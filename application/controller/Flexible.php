<?php
/**
 * 特效页
 */
namespace app\controller;

use think\View;

class Flexible
{
    // View类，实例化对应对象
    protected $v;
    // 构造函数
    public function __construct()
    {
        $this->v = new View;
    }
    // 大事记
    public function memorabilia()
    {
        echo $this->v->fetch('Flexible/' . __FUNCTION__);
    }
}
