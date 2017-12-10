<?php
/**
 * 公共访问接口
 */
namespace app\api;

use think\Db;

class Common_basic
{

    /**
     * @api {get} /Api?con=Common_basic&act=friend_link_info 友情链接列表
     * @apiName friend_link_info
     * @apiGroup Common_basic
     *
     * @apiDescription  查看友情链接地址列表信息
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *  "info": [{
     *      "id": "",
     *      "title": "",
     *      "url": ""
     *   },...],
     * }
     */
    public function friend_link_info()
    {
        $_res['info'] = Db::table('friend_link')->select();
        trans_json($_res);
    }

    /**
     * @api {get} /Api?con=Common_basic&act=logout 用户注销
     * @apiName logout
     * @apiGroup Common_basic
     *
     * @apiDescription  用户注销
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 302 Moved Temporatily
     */
    public function logout()
    {
        if (isset($_SESSION['user']['id'])) {
            $url = '/';
            session_destroy();
        } else {
            $url = '/404.html';
        }
        header('Location:' . $url);
        exit();
    }

}
