<?php
/**
 * CLI模式执行，用于shell定时任务
 */
// 用法示例： php ../public/index.php Cli/check_order
namespace app\controller;

use app\logic\cli_sitemap;
use Mine\Smtp;
use think\View;

class Cli
{
    // ~~~~~~~test~~~~~~~
    public function run_bat()
    {
        echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
        $class_names = get_class_methods(__CLASS__);
        $not_require = [
            '__construct',
            '__destruct',
            __FUNCTION__,
        ];
        $class_names = array_diff($class_names, $not_require);
        foreach ($class_names as $k => $v) {
            echo 'Func: ' . $v . PHP_EOL;
            $this->$v();
            echo PHP_EOL . PHP_EOL;
        }
    }

    // 构造函数
    public function __construct()
    {
        // Clis模式才能运行
        if (!preg_match('/cli/i', php_sapi_name())) {
            header("Location: /404.html");
            exit();
        }
    }
    // 析构函数
    public function __destruct()
    {
        echo PHP_EOL . 'Time: ' . date("Y/m/d H:m:s") . PHP_EOL;
    }

    // [每天凌晨0点] 生成sitemap.xml
    public function sitemap()
    {
        $Sitemap = new cli_sitemap();
        $Sitemap->run();
        echo 'Sitemap created.';
    }

    // [每天凌晨0点] 发送压缩好的备份数据库到邮箱，并删除30天前的
    // 命令行运行php，与服务器 生成的日志文件，权限不同，暂停书写日志
    public function bak_sql_to_email()
    {
        $last_day      = date("Ymd", strtotime("-1 day"));
        $set_file_name = $last_day . '.tar.gz';
        $to            = 'myboyli4@163.com';
        $title         = 'blog v2.0 - 数据备份';
        // 写入html模板
        $v            = new View;
        $v->file_name = $set_file_name;
        $content      = $v->fetch('Email_tpl/bak_sql');

        $file_path = ROOT_PATH . '__materials/sql_baks/' . $set_file_name;
        $path      = realpath($file_path);
        if (is_file($path)) {
            $status = Smtp::send($to, $title, $content, $path, $set_file_name);
            if ($status) {
                // Log::out('Send sql_bak file to the email success', 1);
            } else {
                // Log::out('Send sql_bak file to the email failed', 1);
            }
            $before_30_day = date("Ymd", strtotime("-30 day"));
            $set_file_name = $before_30_day . '.tar.gz';
            $file_path     = ROOT_PATH . '__materials/sql_baks/' . $set_file_name;
            $path          = realpath($file_path);
            @unlink($path);
        } else {
            // Log::out('No such a sql_bak file', 1);
        }
    }

}
