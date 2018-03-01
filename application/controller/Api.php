<?php
/**
 * API 入口，防接口爆破
 */
namespace app\controller;

use Mine\Filter;
use think\Request;
use Mine\Location;
use think\Db;

class Api
{
    //初始化配置
    private $set_count   = 200; // 规定时间内，次数限制。超过：封ip固定时长
    private $limit_time  = 60; // 规定时间，单位：s
    private $deny_expire = 60 * 60 * 24; // 封号时长，单位s

    /**
     * 实现路由转发，接口调用
     * @param GET : con名称、act方法
     * @param POST: ...[接口所需要的参数]
     */
    public function index()
    {
        // 本地跨域调试，CORS配置
        if( config('app_debug') ){
            header('Access-Control-Allow-Origin: *');
        }
        $this->if_denied()->limit();
        $g = Request::instance()->get();
        @Filter::is_set([
            $g['con'],
            $g['act'],
        ]);
        $con = &$g['con'];
        $act = &$g['act'];
        // 依据命名空间，引入接口类
        $cla_nam = '\\app\\api\\' . $con;
        // 判断是否存在对应类及其方法
        @in_array($act, get_class_methods($cla_nam)) ? true : exit('{"Err":1001}');
        // 调用接口
        $api_class = new $cla_nam;
        $api_class->$act();
    }

    /**
     * 查询是否是被封的 ip，并拒绝已封IP
     * @return Object 用于链式调用
     */
    public function if_denied()
    {
        if (isset($_SESSION['api']['deny'])) {
            switch ($_SESSION['api']['deny']) {
                case 2: // 已在被封名单
                    exit('{"Err":1008}');
                case 3: // 恶意调用 API
                    exit('{"Err":1007}');
                default:
                    exit('{"Err":1000}');
            }
        } else {
            $r = Db::query('
                Select ip, time, expire
                From `user_deny_ip`
                Where ip = ?
            ', [ Location::get_ip()]);
            // 在表中？
            if (count($r)) {
                // 超过时长？
                extract($r[0]); // 生成变量 $ip $time $expire
                $dis_time = time() - $time;
                if ($des_time >= $expire) {
                    // 超过封杀时间
                    Db::execute('
                        Delete From `user_deny_ip`
                        Where `ip`=?
                    ', [$ip]);
                } else {
                    $_SESSION['api']['deny'] = 2;
                    exit('{"Err":1008}');
                }
            }
        }
        return $this;
    }

    /**
     * 接口调用限制检测
     */
    public function limit()
    {
        // 记录调用次数
        if (!isset($_SESSION['api']['count'])) {
            $_SESSION['api']['count'] = 1;
        } elseif ($_SESSION['api']['count'] < $this->set_count) {
            $_SESSION['api']['count']++;
        }
        // 记录开始调用时的时间戳。要初始化？
        if (!isset($_SESSION['api']['time'])) {
            $_SESSION['api']['time'] = time();
        }
        // 检测统计。 超出有效期？
        $dis_time = time() - $_SESSION['api']['time'] - $this->limit_time;
        if ($dis_time >= 0) {
            $_SESSION['api']['time']  = time();
            $_SESSION['api']['count'] = 1;
        }
        // 次数过多？
        if ($_SESSION['api']['count'] >= $this->set_count) {
            $this->register_ip();
            unset($_SESSION['api']['time']);
            unset($_SESSION['api']['count']);
            $_SESSION['api']['deny'] = 3;
            exit('{"Err":1007}');
        }
    }

    /**
     * 录入，被封的 ip
     */
    public function register_ip()
    {
        Db::execute('
            Insert into `user_deny_ip`
            (ip,time,expire)
            Values(?,?,?)
        ', [Location::get_ip(), time(), $this->deny_expire]);
    }
}
