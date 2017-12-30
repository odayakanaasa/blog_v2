<?php /**
 * 测试相关
 */
namespace app\controller;

use think\Request;
use think\View;

class Test
{
    public function index()
    {
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: GET, POST');
        // header('Access-Control-Max-Age: 9999');
        // echo '{"yth":true}';
        out(parse_ini_file(ROOT_PATH . 'sensitive_config.ini'));
    }

    /**
     * @param Array : allow 线上也可能访问的列表
     */
    private static $allow = [
        "slide_verify",
        "crypt",
        "express_delivery",
    ];

    // 访问控制
    public function __construct()
    {
        $action_name = Request::instance()->action();
        // 需控制的
        if (!in_array(Request::instance()->action(), self::$allow)) {
            if (config('app_debug') == false) {
                exit('<h3>请开启，调试模式</h3>');
            }
        }
    }

    // "文章重新由时间排序成功"
    public function reorder_article_primary_id()
    {
        // 先删除primary 再重建 该字段，运行后 重设为primary
        \think\Db::execute('
            alter table blog_text drop column id
        ');
        \think\Db::execute('
            alter table blog_text add column id int(11)
        ');

        // 按照时间排序
        $data = \think\Db::query('
            Select `title`,`time`
            From `blog_text`
            Order By `time` ASC
        ');

        for ($i = 0, $len = count($data); $i < $len; $i++) {
            \think\Db::execute('
                Update `blog_text`
                Set `id` = ?
                Where `title` = ?
            ', [$i + 1, $data[$i]['title']]);
        }

        \think\Db::execute('
            alter table blog_text change id  id int AUTO_INCREMENT primary key;
        ');

        out([
            "文章重新由时间排序成功",
            "time: " . date('Y-m-d h:i:s'),
        ]);
    }

    // [可访问] 加密相关
    public function crypt()
    {
        echo md5('1234567831') . ' <br />';
        // 对称加密
        $en = \Crypt\yth_crypt::encrypt("云天河");
        $de = \Crypt\yth_crypt::decrypt($en);
        out(["对称加密" => [$en, $de]]);
        // RSA加密
        $code = "hlz100";
        $en   = \Crypt\Rsa::encrypt($code);
        $de   = \Crypt\Rsa::decrypt($en);
        //
        $that = "dfksyzoyIe3M44xwU9b9We0496bdlPSc/fNagTV+UqioVamy5m4/SEu6SYWcq2F3zsXo1+4q8i5vD79l7ip5S/nv1lru//j3gkTLeVR8KH1576+I5b9jIgCdiYEVKOMnQvj0uu7yY58A1PTNKsHZJJ0XhiiQDIi+L2LL/ZLalO8=";
        out([
            "decode_that" => \Crypt\Rsa::decrypt($that),
        ]);
        out([$en, $de]);
        // 获取公钥
        out(\Crypt\Rsa::get_key("public"));
    }
    // [可访问] 滑动验证码
    public function slide_verify()
    {
        $v = new View();
        echo $v->fetch('Test/verify');
    }

    // 分页
    public function page()
    {
        $r = new \Mine\Page('
            Select *
            From `hlz_staff_login_logs`
            Order By ip  Limit ?,?
        ', []);
        $r->page_size = 2;
        $page_data    = $r->get_result();
        // var_dump( $page_data["info"] );
        echo $page_data["render"];
    }

    // 输出 session信息
    public function session()
    {
        out($_SESSION);
    }
    public function session_destroy()
    {
        session_destroy();
        echo 'ok';
    }

    // WangeEditor实例化
    public function editor()
    {
        $v = new View();
        echo $v->fetch('Test/editor');
    }

    // echarts
    public function echarts()
    {
        $v = new View();
        echo $v->fetch('Test/echarts');
    }

}
