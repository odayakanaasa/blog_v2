<?php
/**
 * 访客行为，添加
 */
namespace app\api;

use Mine\Filter;
use Mine\Location;
use think\Db;
use think\Request;

class Common_behaviour
{
    public function __construct()
    {
        // 如果是博主，不继续进行
        if (isset($_SESSION['user']['id']) && -1 == $_SESSION['user']['id']) {
            exit();
        }
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +              访问足迹【只记录View层】
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */

    /**
     * @api {post} /Api?con=Common_behaviour&act=user_behaviour_add 访问足迹：添加
     * @apiName user_behaviour_add
     * @apiGroup Common_behaviour
     *
     * @apiParam {string} url 访问地址
     *
     * @apiDescription  记录人们访问过的页面足迹
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true
     * }
     */
    public function user_behaviour_add()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['url'], // 用户访问的地址
        ]);
        $p['ip']       = Location::get_ip();
        $p['location'] = Location::ip_location($p['ip']);
        Db::table('user_behaviour')->insert($p);
        if_modify(1);
    }

}
