<?php
namespace tests;

use app\api\Admin_article; // 单元测试，需要的文件
use Mine\CurlRequest; // API逻辑文件
use think\testing\TestCase;

// 封装好的 Curl 文件

// 类名与文件名要保持一致，并且以 *Test.php 格式命名
class AdminArticleApiTest extends TestCase
{
    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                    博文分类
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */

    private static $category_id; // 临时插入的类名 id

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
        $msg           = []; // 待返回的json数据
        $msg['status'] = true;
        // Method One: 完全相同？
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

    public function test_blog_category_list_info()
    {
        $g        = []; // GET参数
        $g['con'] = 'Admin_article';
        $g['act'] = 'blog_category_list_info';
        // $p = []; // POST参数
        $url = config('unit_host') . '/Api?' . http_build_query($g);
        $res = CurlRequest::run($url);
        $reg = '/info(.*?)/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }

    public function test_blog_category_list_edit()
    {
        $g          = []; // GET参数
        $g['con']   = 'Admin_article';
        $g['act']   = 'blog_category_list_edit';
        $p          = []; // POST参数
        $p['id']    = self::$category_id;
        $p['title'] = 'unit_title_2';
        $url        = config('unit_host') . '/Api?' . http_build_query($g);
        $res        = CurlRequest::run($url, $p);
        // $msg = []; // 待返回的json数据
        // $msg['status'] = true;
        // Method One: 完全相同？
        // $this->assertEquals( $res, json_encode($msg) );
        // Method Two: 是否符合正则结果？
        $reg = '/status(.*?)true/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
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

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                    博文内容
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */

    private static $article_id; // 临时插入的文章名 id

    public function test_blog_text_add()
    {
        $g                = []; // GET参数
        $g['con']         = 'Admin_article';
        $g['act']         = 'blog_text_add';
        $p                = []; // POST参数
        $p['cate_id']     = 1; // 对应文章分类
        $p['cover_url']   = 'http://i1.piimg.com/567571/2a51ea4fa1c03f8a.jpg'; // 封面图片url
        $p['title']       = '单元测试 - 临时文章';
        $p['descript']    = '测试而已'; // 文章概述
        $p['type']        = 0; // 文本类型 0=>Markdown 1=>Editor
        $p['raw_content'] = '## 测试文';
        $p['sticky']      = 0; // 置顶项[0=>未置顶、1=>置顶]
        $p['original']    = 0; // [0=>原创,1=>转载]
        $p['bg_id']       = 0; //  对应文章背景主题号【0=>没有背景主题】
        $url              = config('unit_host') . '/Api?' . http_build_query($g);
        $res              = CurlRequest::run($url, $p);
        // 是否符合正则结果？
        $reg = '/status(.*?)true/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);

        // 找到刚刚插入的那条数据
        $_r = \think\Db::table('blog_text')
            ->where('title', $p['title'])
            ->select();
        $this->assertEquals(1, count($_r));
        self::$article_id = $_r[0]['id'];
    }

    public function test_blog_text_info()
    {
        $g            = []; // GET参数
        $g['con']     = 'Admin_article';
        $g['act']     = 'blog_text_info';
        $g['to_page'] = 1;
        // $p = []; // POST参数
        $url = config('unit_host') . '/Api?' . http_build_query($g);
        $res = CurlRequest::run($url);
        // 是否符合正则结果？
        $reg = '/info(.*?)page_count(.*?)total(.*?)/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }

    public function test_blog_text_search()
    {
        $g          = []; // GET参数
        $g['con']   = 'Admin_article';
        $g['act']   = 'blog_text_search';
        $g['title'] = '单元测试';
        // $p = []; // POST参数
        $url = config('unit_host') . '/Api?' . http_build_query($g);
        $res = CurlRequest::run($url);
        // 是否符合正则结果？
        $reg = '/info(.*?)cover_url(.*?)descript(.*?)type(.*?)sticky(.*?)original(.*?)title(.*?)id(.*?)cate_name(.*?)/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }

    public function test_blog_text_edit()
    {
        $g                = []; // GET参数
        $g['con']         = 'Admin_article';
        $g['act']         = 'blog_text_edit';
        $p                = []; // POST参数
        $p['id']          = self::$article_id; // 对应文章分类
        $p['cate_id']     = 1; // 对应文章分类
        $p['cover_url']   = 'http://i1.piimg.com/567571/2a51ea4fa1c03f8a.jpg'; // 封面图片url
        $p['title']       = '单元测试 - 临时文章_edit';
        $p['descript']    = '测试而已'; // 文章概述
        $p['type']        = 0; // 文本类型 0=>Markdown 1=>Editor
        $p['raw_content'] = '## 测试文';
        $p['sticky']      = 0; // 置顶项[0=>未置顶、1=>置顶]
        $p['original']    = 0; // [0=>原创,1=>转载]
        $p['bg_id']       = 0; //  对应文章背景主题号【0=>没有背景主题】
        $url              = config('unit_host') . '/Api?' . http_build_query($g);
        $res              = CurlRequest::run($url, $p);
        // 是否符合正则结果？
        $reg = '/status(.*?)true/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }

    public function test_blog_text_find()
    {
        $g        = []; // GET参数
        $g['con'] = 'Admin_article';
        $g['act'] = 'blog_text_find';
        $g['id']  = self::$article_id;
        $url      = config('unit_host') . '/Api?' . http_build_query($g);
        $res      = CurlRequest::run($url);
        // 是否符合正则结果？
        $reg = '/info(.*?)id(.*?)cate_id(.*?)cover_url(.*?)title(.*?)descript(.*?)type(.*?)raw_content(.*?)/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }

    public function test_blog_text_del()
    {
        $g        = []; // GET参数
        $g['con'] = 'Admin_article';
        $g['act'] = 'blog_text_del';
        $p        = []; // POST参数
        $p['id']  = self::$article_id;
        $url      = config('unit_host') . '/Api?' . http_build_query($g);
        $res      = CurlRequest::run($url, $p);
        // 是否符合正则结果？
        $reg = '/status(.*?)true/'; // 对于获取的结果进行正则匹配
        $this->assertRegExp($reg, $res);
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +        评论、留言[其他在Common_reply里]
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    */
    

}
