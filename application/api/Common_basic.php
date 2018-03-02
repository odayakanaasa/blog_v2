<?php
/**
 * 公共访问接口
 */
namespace app\api;

use Mine\Response;
use think\Db;
use think\Request;

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

    /**
     * @api {get} /Api?con=Common_basic&act=blog_category_list_info 博文分类信息
     * @apiName blog_category_list_info
     * @apiGroup Common_basic
     *
     * @apiDescription  查看所有分类
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "id": "",
     *     "title": ""
     *     "total":""
     *   },...]
     * }
     */
    public function blog_category_list_info()
    {
        // 所有分类以及数量
        $_r2 = Db::query('
            Select  a.*, count(b.id) as total
            From `blog_category_list` as a
            Inner Join `blog_text` as b
            On a.`id`= b.`cate_id`
            Where a.`id`!=0
            Group By b.`cate_id`
        ');
        echo Response::success($_r2);
    }

    /**
     * @api {get} /Api?con=Common_basic&act=get_index_article_list 依据类别号或者关键词，进行文章分页
     * @apiName get_index_article_list
     * @apiGroup Common_basic
     *
     * @apiDescription  首页分页，或者搜索
     * @apiParam {string} to_page 页码，默认值为1
     * @apiParam {string} search  依据关键词，可选
     * @apiParam {string} cate_id 依据分类号，可选
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "id": "",
     *     "title": ""
     *     "total":""
     *   },...]
     * }
     */
    public function get_index_article_list()
    {

        $g = Request::instance()->get();
        // 对应查询字段的数据
        $field = [];
        // 搜索功能
        if (isset($g['search'])) {
            $search = '%' . $g['search'] . '%';
            $field  = [
                $search,
                $search,
            ];
            $find_sql = ' Where a.`title` like ? or a.`descript` like ? ';
        } else {
            // 分类查询
            $cate_id = isset($g['cate_id']) ? intval($g['cate_id']) : 0;
            if ($cate_id == 0) {
                $find_sql = ' Where a.`cate_id`>? ';
            } else {
                $find_sql = ' Where a.`cate_id`=? ';
            }
            $field = [
                $cate_id,
            ];
        }
        // 计算文章，统计评论
        $pagenation = new \Mine\Page('
                Select
                    a.cover_url, a.descript, a.type, a.sticky, a.original,
                    a.title, a.id , a.statistic, a.cate_id, Left(a.time,10) as time,
                    b.title as cate_name
                From
                    `blog_text` as a
                Inner Join
                    `blog_category_list` as b
                On
                    b.`id` = a.`cate_id`
                ' . $find_sql . '
                Order By a.`id` Desc
                Limit ?,?
            ', $field);
        $pagenation->page_size = 10;
        $_r                    = $pagenation->get_result();
        echo Response::success($_r);
    }

}
