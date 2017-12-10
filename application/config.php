<?php
/**
 * 配置目录
 */

// +----------------------------------------------------------------------
// | 配置目录     $env 为敏感配置，防止git自动上传
// +----------------------------------------------------------------------
$env = parse_ini_file(ROOT_PATH . 'sensitive_config.ini');
// +----------------------------------------------------------------------

return [
    // 当前站点域名
    'now_host'                => $env['host'],
    // Seo默认配置
    'seo_keywords'            => '云天河,云天河博客,云天河Blog,个人博客,hlz,hlzblog',
    'seo_description'         => '云天河制作的第二版博客',
    'seo_title_suffix'        => ' | 云天河Blog', // 博客名

    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'           => 'app',
    // 应用调试模式
    'app_debug'               => $env['app_debug'],
    // 应用Trace
    'app_trace'               => $env['app_trace'],
    // 应用模式状态
    'app_status'              => '',
    // 是否支持多模块
    'app_multi_module'        => false,
    // 入口自动绑定模块
    'auto_bind_module'        => false,
    // 注册的根命名空间
    'root_namespace'          => [],
    // 扩展函数文件
    'extra_file_list'         => [THINK_PATH . 'helper' . EXT],
    // 默认输出类型
    'default_return_type'     => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'     => '',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'   => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'       => 'callback',
    // 默认时区
    'default_timezone'        => 'PRC',
    // 是否开启多语言
    'lang_switch_on'          => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'          => 'htmlspecialchars,trim',
    // 默认语言
    'default_lang'            => 'zh-cn',
    // 应用类库后缀
    'class_suffix'            => false,
    // 控制器类后缀
    'controller_suffix'       => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'          => 'index',
    // 禁止访问模块
    'deny_module_list'        => ['common'],
    // 默认控制器名
    'default_controller'      => 'Index',
    // 默认操作名
    'default_action'          => 'index',
    // 默认验证器
    'default_validate'        => '',
    // 默认的空控制器名
    'empty_controller'        => 'Error',
    // 操作方法后缀
    'action_suffix'           => '',
    // 自动搜索控制器
    'controller_auto_search'  => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'            => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'          => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'           => '/',
    // URL伪静态后缀
    'url_html_suffix'         => '',
    // URL普通方式参数 用于自动生成
    'url_common_param'        => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'          => 0,
    // 是否开启路由
    'url_route_on'            => true,
    // 路由使用完整匹配
    'route_complete_match'    => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'       => ['route'],
    // 是否强制使用路由
    'url_route_must'          => false,
    // 域名部署
    'url_domain_deploy'       => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'         => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'             => true,
    // 默认的访问控制器层
    'url_controller_layer'    => 'controller',
    // 表单请求类型伪装变量
    'var_method'              => '_method',

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'                => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'        => [],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'   => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'     => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'          => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'           => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'          => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'        => '',

    // 关闭调试模式后生效
    'http_exception_template' => [
        // 定义404错误的重定向页面地址
        404 => ROOT_PATH . '/public/404.html',
        // 还可以定义其它的HTTP status
    ],

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                     => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'test', // test关闭，File写入
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => [],
    ],

    // 彩色日志
    'log_colored'             => [
        'switch'    => $env['log_colored_switch'], // Boolean  关 => false 开 => true
        'level'     => $env['log_colored_level'], // 该日志等级及以上，可以写入日志中
        'time_zone' => $env['log_colored_time_zone'], // 时区
        'path'      => ROOT_PATH . 'log_colored', // 日志存放路径
    ],

    // 邮箱配置
    'smtp'                    => [
        'Host'     => $env['smtp_Host'], // 链接qq域名邮箱的服务器地址，  示例 smtp.163.com
        'FromName' => $env['smtp_FromName'], // 你的昵称
        'From'     => $env['smtp_From'], // smtp邮箱全称
        'Username' => $env['smtp_Username'], // smtp邮箱帐号，如果是qq邮箱则是qq号，如果是163邮箱：除去@163.com的部分
        'Password' => $env['smtp_Password'], // smtp邮箱 授权码 cddbstebcoxgbhjc
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'trace'                   => [
        // 内置Html Console 支持扩展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                   => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                 => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => '',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                  => [
        // cookie 名称前缀
        'prefix'    => '',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],

    //验证码配置
    'captcha'                 => [
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 是否画混淆曲线
        'useCurve' => true,
        // 验证码位数
        'length'   => 4,
        // 验证成功后是否重置
        'reset'    => true,
    ],

    // 腾讯云 COS
    'Tencent_COS'             => [
        // 华南 -> gz,   华东 -> sh,  华北 -> tj
        'setRegion'  => $env['cos_setRegion'],
        'bucketName' => $env['cos_bucketName'],
        'source_url' => $env['cos_source_url'],
        'APPID'      => $env['cos_APPID'],
        'SECRET_ID'  => $env['cos_SECRET_ID'],
        'SECRET_KEY' => $env['cos_SECRET_KEY'],
    ],

    // +----------------------------------------------------------------------
    // | 第三方登陆配置 : qq、sina
    // +----------------------------------------------------------------------
    'qq_config'               => [
        'appid'    => $env['qq_config_appid'],
        'appkey'   => $env['qq_config_appkey'],
        'callback' => $env['qq_config_callback'],
        'scope'    => $env['qq_config_scope'],
    ],
    'sina_config'             => [
        'WB_AKEY'         => $env['sina_config_WB_AKEY'],
        'WB_SKEY'         => $env['sina_config_WB_SKEY'],
        'WB_CALLBACK_URL' => $env['sina_config_WB_CALLBACK_URL'],
    ],

    // +----------------------------------------------------------------------
    // | Nosql配置 : Redis
    // +----------------------------------------------------------------------

    // 主要用于集群,同一个业务，部署在多个服务器上
    'Redis'                   => [
        'Master' => [
            // [
            //     "host" => "127.0.0.1",
            //     "port" =>  6379,
            //     "auth" => "hlzblog"
            // ],
            [
                "host" => $env['redis_m_host_1'],
                "port" => $env['redis_m_prot_1'],
                "auth" => $env['redis_m_auth_1'],
            ],
        ],
        'Slave'  => [
            // [
            //     "host" => "127.0.0.1",
            //     "port" =>  6379,
            //     "auth" => "hlzblog"
            // ],
            [
                "host" => $env['redis_s_host_1'],
                "port" => $env['redis_s_prot_1'],
                "auth" => $env['redis_s_auth_1'],
            ],
        ],
    ],

    // 暂时用不上的，主要用于分布式,一个业务分拆多个子业务，部署在不同的服务器上
    'Memcache'                => [
    ],

];
