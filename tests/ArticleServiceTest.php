<?php
namespace tests;
use think\testing\TestCase; // 单元测试，需要的文件 
use app\service\Article; // 普通逻辑文件

// 类名与文件名要保持一致，并且以 *Test.php 格式命名
class ArticleServiceTest extends TestCase{

    // 函数要以test开头
    public function test_index(){
        $g['id'] = 3; // 函数所需的传入参数
        $obj = new Article();
        $res = $obj->index($g); // 运行对应函数并获取对应的返回值
        // 返回的数组中，是否含有对应的键名
        $this->assertArrayHasKey('article_info', $res);
        $this->assertArrayHasKey('cate_list', $res);
        $this->assertArrayHasKey('recommands', $res);
        $this->assertArrayHasKey('count_commit', $res);
    }

}