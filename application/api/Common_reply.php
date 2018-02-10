<?php
/**
 * 管理员接口 基类，用户输入部分，需要xss过滤
 */
namespace app\api;

use HTMLPurifier\Main;
use Mine\Filter;
use think\Db;
use think\Request;

class Common_reply
{

    /**
     * @api {post} /Api?con=Common_reply&act=check_auth 评论权限检测
     * @apiName check_auth
     * @apiGroup Common_reply
     *
     * @apiDescription  作为接口，失败时才有输出，内部调用时，返回用户id相关数组
     *
     * @apiVersion 2.0.0
     * @apiErrorExample {json} Error-Response:
     * HTTP/1.1 404 Not Found
     * {
     *   "Err": "1014"
     * }
     */
    public function check_auth()
    {        // 如果开启了单元测试
        if ( true == config('unit_switch') ) {
            $data['pic']      = 'http://img.cdn.hlzblog.top/17-6-25/39571626.jpg';
            $data['name']     = '云天河 - 单元测试';
            $data['id']       = -1;
            $_SESSION = $data; // 写入权限
            return $p['user_id'] = $_SESSION['user']['id'];
        }else{
            if (!isset($_SESSION['user']['id'])) {
                $msg['Err'] = '1014';
                trans_json($msg);
            }else{
                return $_SESSION['user']['id'];
            }
        }
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++

    /**
     * @api {post} /Api?con=Common_reply&act=comment_add 评论：添加
     * @apiName comment_add
     * @apiGroup Common_reply
     *
     * @apiParam {string} article_id 文章号 ，但 0=> 留言
     * @apiParam {string} content 内容
     *
     * @apiDescription  添加主楼回复
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true
     * }
     */
    public function comment_add()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['article_id'],
            $p['content'],
        ]);
        $article_id = intval($p['article_id']);
        // 登陆检测
        $p['user_id'] = $this->check_auth();

        // 普通文章？
        if (0 != $article_id) {
            // 文章存在？
            $_res = Db::query('
				Select `id`
				From `blog_text`
				Where `id`=?
			', [$article_id]);
            if (!count($_res)) {
                $msg['Err'] = '1004';
                trans_json($msg);
            }
        }
        // XSS过滤
        $p['content'] = Main::run($p['content']);
        // 录入
        Db::table('blog_comment')->insert($p);
        if_modify(1);
    }

    /**
     * @api {get} /Api?con=Common_reply&act=comment_info 评论：查看主楼
     * @apiName comment_info
     * @apiGroup Common_reply
     *
     * @apiParam {string} to_page 页码，默认值为1
     * @apiParam {string} article_id 文章号
     *
     * @apiDescription  分页获取主楼评论数据
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "id": "",
     *     "time": "",
     *     "content": "",
     *     "name": "",
     *     "type": "",
     *     "pic": "",
     *   }, ...],
     *   "page_count": "",
     *   "total": ""
     * }
     */
    public function comment_info()
    {
        $g = Request::instance()->get();
        @Filter::is_set([
            $g['article_id'],
        ]);
        $p = new \Mine\Page('
			Select a.`id`, a.`time`, a.`content`, b.`name`, b.`type`, b.`pic`
			From `blog_comment` as a
			Inner Join `user` as b
			On b.`id`=a.`user_id`
			Where a.`article_id`=?
			Order By a.`id` Desc
			Limit ?,?
		', [$g['article_id']]);
        $p->page_size = 10;
        $p->is_render = false;
        $d            = $p->get_result();
        trans_json($d);
    }

    /**
     * @api {post} /Api?con=Common_reply&act=reply_add 楼中楼：添加
     * @apiName reply_add
     * @apiGroup Common_reply
     *
     * @apiParam {string} floor_id 文章号 ，但 0=> 留言
     * @apiParam {string} content 内容
     *
     * @apiDescription  添加主楼回复
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true
     * }
     */
    public function reply_add()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['floor_id'], // 文章号 ，但 0=> 留言
            $p['content'], // 内容
        ]);
        $floor_id = &$p['floor_id'];
        // 登陆检测
        $p['user_id'] = $this->check_auth();
        // 楼层存在？
        $_res = Db::query('
			Select `id`
			From `blog_comment`
			Where `id`=?
		', [$floor_id]);
        if (!count($_res)) {
            $msg['Err'] = '1004';
            trans_json($msg);
        }
        // 过滤
        $p['content'] = \HTMLPurifier\Main::run($p['content']);
        // 录入
        Db::table('blog_comment_reply')->insert($p);
        if_modify(1);
    }

    /**
     * @api {get} /Api?con=Common_reply&act=reply_info 楼中楼：查看
     * @apiName reply_info
     * @apiGroup Common_reply
     *
     * @apiParam {string} to_page 页码，默认值为1
     * @apiParam {string} floor_id 文章号
     *
     * @apiDescription  分页查看楼中楼
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "id": "",
     *     "time": "",
     *     "content": "",
     *     "name": "",
     *     "type": "",
     *     "pic": "",
     *   }, ...],
     *   "page_count": "",
     *   "total": ""
     * }
     */
    public function reply_info()
    {
        $g = Request::instance()->get();
        @Filter::is_set([
            $g['floor_id'],
        ]);
        $p = new \Mine\Page('
			Select a.`id`, a.`time`, a.`content`, b.`name`, b.`type`, b.`pic`
			From `blog_comment_reply` as a
			Inner Join `user` as b
			On b.`id`=a.`user_id`
			Where a.`floor_id`=?
			Order By a.`id`
			Limit ?,?
		', [$g['floor_id']]);
        $p->page_size = 4;
        $p->is_render = false;
        $d            = $p->get_result();
        trans_json($d);
    }

}
