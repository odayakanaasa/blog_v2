## phpunit官方文档
[http://www.phpunit.cn/manual/7.0/zh_cn/appendixes.assertions.html#appendixes.assertions.assertRegExp](http://www.phpunit.cn/manual/7.0/zh_cn/appendixes.assertions.html#appendixes.assertions.assertRegExp)  

> 测试数据，记得测完要自动删除

## 示例
### 测试API
请先配置 sensitive_config.ini 中的 unit_host 值为你本地的测试域名  
此外 unit_switch 值 请设置为 true ，但千万注意线上环境这个值一定要为 false

    <?php
    namespace tests;
    use think\testing\TestCase; // 单元测试，需要的文件 
    use app\api\Admin_article; // API逻辑文件
    use Mine\CurlRequest; // 封装好的 Curl 文件
    use Mine\Token;
    
    // 类名与文件名要保持一致，并且以 *Test.php 格式命名
    class AdminArticleApiTest extends TestCase{
        
        private static $category_id; // 临时插入的类名 id ，因为测试的时候是静态调用，所以内部变量也为静态方可调用
        
        // 函数要以test开头、然后自定义函数名，当然最好是 test+类中对应函数名 的形式
        public function test_blog_category_list_add()
        {
            $g             = []; // GET参数
            $g['con']      = 'Admin_article';
            $g['act']      = 'blog_category_list_add';
            $p             = []; // POST参数
            $p['title']    = 'unit_title';
            $url           = config('unit_host') . '/Api?' . http_build_query($g);
            $res           = CurlRequest::run($url, $p);
            // Method One: 完全相同？
            // $msg           = []; // 待返回的json数据
            // $msg['status'] = true;
            // $this->assertEquals( $res, json_encode($msg) );
            // Method Two: 是否符合正则结果？
            $reg = '/status(.*?)true/'; // 对于获取的结果进行正则匹配
            $this->assertRegExp($reg, $res);

            // 找到刚刚插入的那条数据
            $_r = \think\Db::table('blog_category_list')
                ->where('title', $p['title'])
                ->select();
            $this->assertEquals(1, count($_r));
            self::$category_id = $_r[0]['id'];
        }
        
        public function test_blog_category_list_del()
        {
            $g        = []; // GET参数
            $g['con'] = 'Admin_article';
            $g['act'] = 'blog_category_list_del';
            $p        = []; // POST参数
            $p['id']  = self::$category_id;
            $url      = config('unit_host') . '/Api?' . http_build_query($g);
            $res      = CurlRequest::run($url, $p);
            // Method Two: 是否符合正则结果？
            $reg = '/status(.*?)/'; // 对于获取的结果进行正则匹配
            $this->assertRegExp($reg, $res);
        }
        
    }

### 测试普通逻辑的返回值

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