<?php
/**
* 用户相关
*/
namespace app\controller;
use think\View;
use think\Request;
use app\service\User as UserService;
class User{
    // 判断是否为pjax请求
    private  $pjax ;

    // View类，实例化对应对象
    protected $v;

    /**
    * @param Array : allow 无需身份认证，即可使用
    */
    private static $allow = [
        "index",
        "register"
    ];
    // 实现访问控制，不作SEO
    public function __construct(){
        $this->v  = new View;
        if(  !in_array(Request::instance()->action(), self::$allow)  ){
            // 身份判断
            if(  !isset($_SESSION['user']['id'])  ){
                header("Location:/User/index.html");
                exit();
            }
            // 判断是否为 pjax请求
            $this->pjax = isset(getallheaders()['X-PJAX']) ? true : false;
        }
    }
    // 析构函数，后置操作
    public function __destruct(){
        $action = Request::instance()->action();
        if(   !in_array($action, self::$allow)    &&   in_array($action, get_class_methods(__CLASS__) )    &&   !$this->pjax ){
            echo $this->v->fetch('User/footer');
            echo $this->v->fetch("Index/footer");
        }
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                    公共部分
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    */

    // 用户登录界面
    public function index(){
        $this->v->render_tpl = \Mine\Slide::instance();
    	echo $this->v->fetch('User/index');
    }
    // 普通通话注册
    public function register(){
        $this->v->render_tpl = \Mine\Slide::instance();
        echo $this->v->fetch('User/register');
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +       用户权限，渲染，并判断是否为pjax输出
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    */

    /**
    * 统一请求
    * @param  String : func_name 模块名
    * @param  String : name   Seo名字
    * @param  Array  : param  数组方式传参到函数
    * @param  String : module_suffix 模块名后缀
    */
    protected function render_html($func_name='', $name, $param =[], $module_suffix='' ){
        $ser = new UserService();
        $this->v->module_name    = $func_name.$module_suffix;
        $this->v->seo_keywords   = $name;
        $this->v->seo_description= $name;
        if( $param!=[] ){
            $this->v->info = $ser->$func_name($param);
        }else{
            $this->v->info = $ser->$func_name();
        }

        if(  !$this->pjax ){
            echo $this->v->fetch("Index/header");
            echo $this->v->fetch('User/header');
            echo $this->v->fetch("User/". $func_name);
        }else{
            $content = $this->v->fetch("User/". $func_name);
            $msg['html'] = &$content;
            $msg['title']= &$name;
            if( config('seo_title_suffix') ){
                $msg['title'] .= config('seo_title_suffix');
            }
            trans_json($msg);
        }
    }

    public function welcome(){
        $this->render_html( __FUNCTION__, '基础资料');
    }
    public function express_info(){
        $this->render_html( __FUNCTION__, '收货信息');
    }

    // 分页查询：[收藏夹]
    public function collect_show(){
        $this->render_html( __FUNCTION__, '收藏夹');
    }

    // 分页查询：购物车
    public function shopping_cart_show(){
        $this->render_html( __FUNCTION__, '购物车');
    }

    // 分页查询：[未付款、(已付款)待发货、已发货]
    public function order_show(){
        $g = Request::instance()->get();
        $g['ordering'] = isset($g['ordering'])  ? intval($g['ordering']) : 0;
        $suffix = '?ordering='.$g['ordering'];
        $this->render_html( __FUNCTION__, '订单状态', $g, $suffix);
    }

    // 分页查询：[退货、换货、拒绝]
    public function order_status(){
        $g = Request::instance()->get();
        $g['type'] = isset($g['type'])  ? intval($g['type']) : 1;
        $suffix = '?type='.$g['type'];
        $this->render_html( __FUNCTION__, '售后详情', $g, $suffix);
    }

    public function assignment(){
        $g = Request::instance()->get();
        $g['type'] = isset($g['type'])  ? intval($g['type']) : 0;
        $suffix = '?type='.$g['type'];
        $this->render_html( __FUNCTION__, '已购商品', $g, $suffix);
    }


    public function system_message(){
        $this->render_html( __FUNCTION__, '系统消息');
    }


}
