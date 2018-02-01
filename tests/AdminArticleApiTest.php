<?php
namespace tests;
use think\testing\TestCase; // 单元测试，需要的文件 
use app\api\Admin_article; // API逻辑文件
use Mine\CurlRequest; // 封装好的 Curl 文件
use Mine\Token;

// 类名与文件名要保持一致，并且以 *Test.php 格式命名
class AdminArticleApiTest extends TestCase{

    // 函数要以test开头、然后自定义函数名，当然最好是 test+类中对应函数名 的形式
    public function test_blog_category_list_add(){
        $g = []; // GET参数
        $g['con'] = 'Admin_article';
        $g['act'] = 'blog_category_list_add';
        $p = []; // POST参数 
        $p['title'] = '心路历程'. Token::rand_str(12);
        $url = config('unit_host') .'/Api?'. http_build_query($g);
        $res = CurlRequest::run($url, $p);
        $msg = []; // 待返回的json数据
        $msg['status'] = true;
        // Method One: 完全相同？
        // $this->assertEquals( $res, json_encode($msg) );
        // Method Two: 是否符合正则结果？
        $reg = '/status(.*?)true/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }
}