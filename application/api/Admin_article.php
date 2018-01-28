<?php
/**
 * 管理员入口
 */
namespace app\api;

use app\api\Admin;
use Mine\Filter;
use think\Db;
use think\Request;

class Admin_article extends Admin
{
    /**
     * 解析 Markdown
     * @param  String $html MarkDown文章
     * @return String 返回 HTML
     */
    private static function parse_markdown($html)
    {
        $html = \Michelf\MarkdownExtra::defaultTransform($html);
        // 图片延迟属性设为 data-original
        return self::lazy_pic($html);
    }

    /**
     * 图片延时 与 防蜘蛛出站 处理
     * @param  String $html MarkDown文章
     * @return String 返回 HTML
     */
    private static function lazy_pic($html)
    {
        // 图片延迟属性设为 data-original
        $rule    = '/<img(.*?)src/';
        $replace = '<img $1 class="lazy_pic" data-original';
        $html    = preg_replace($rule, $replace, $html);
        // 防蜘蛛出站
        $rule    = '/<a(.*?)href/';
        $replace = '<a rel="nofollow" $1 href';
        $html    = preg_replace($rule, $replace, $html);
        return $html;
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                    博文分类
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */

    /**
     * @api {post} /Api?con=Admin_article&act=blog_category_list_add 博文分类：添加
     * @apiName blog_category_list_add
     * @apiGroup Admin_article
     *
     * @apiParam {string} title 分类名
     *
     * @apiDescription  添加博文
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function blog_category_list_add()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['title'], // 分类名
        ]);
        Db::table('blog_category_list')->insert($p);
        if_modify(1);
    }

    /**
     * @api {get} /Api?con=Admin_article&act=blog_category_list_info 博文分类：查看
     * @apiName blog_category_list_info
     * @apiGroup Admin_article
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
     *   },...]
     * }
     */
    public function blog_category_list_info()
    {
        $_res['info'] = Db::table('blog_category_list')->order("title")->select();
        trans_json($_res);
    }

    /**
     * @api {post} /Api?con=Admin_article&act=blog_category_list_edit 博文分类：修改
     * @apiName blog_category_list_edit
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 主键
     * @apiParam {string} title 分类名
     *
     * @apiDescription  修改对应分类名
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function blog_category_list_edit()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['id'], // 主键
            $p['title'], // 分类名
        ]);
        Db::table('blog_category_list')->update($p);
        if_modify(1);
    }

    /**
     * @api {post} /Api?con=Admin_article&act=blog_category_list_del 博文分类：删除
     * @apiName blog_category_list_del
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 主键
     *
     * @apiDescription  删除对应分类名
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function blog_category_list_del()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['id'], // 主键
        ]);
        Db::table('blog_category_list')->delete($p['id']);
        if_modify(1);
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                    博文内容
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */

    /**
     * @api {post} /Api?con=Admin_article&act=blog_text_add 博文内容：添加
     * @apiName blog_text_add
     * @apiGroup Admin_article
     *
     * @apiParam {string} cate_id 对应文章分类
     * @apiParam {string} cover_url 封面图片url
     * @apiParam {string} title 标题
     * @apiParam {string} descript 文章概述
     * @apiParam {string} type 文本类型 0=>Markdown 1=>Editor
     * @apiParam {string} raw_content 未转为html之前的文章内容
     * @apiParam {string} sticky 置顶项[0=>未置顶、1=>置顶]
     * @apiParam {string} original [0=>原创,1=>转载]
     * @apiParam {string} bg_id 对应文章背景主题号【0=>没有背景主题】
     *
     * @apiDescription  添加对应博文
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function blog_text_add()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['cate_id'],
            $p['cover_url'],
            $p['title'],
            $p['descript'],
            $p['type'],
            $p['raw_content'],
            $p['sticky'],
            $p['original'],
            $p['bg_id'],
        ]);
        Filter::is_empty($p['title'], '你还没输入标题呢');
        Filter::is_empty($p['descript'], '别忘了输入文章概述');
        Filter::is_empty($p['cover_url'], '还有封面图没弄呢。');
        // 防重复
        $_res = Db::query('
			Select `title`
			From `blog_text`
			Where `title`=?
		', [$p['title']]);
        if (count($_res)) {
            $msg['out'] = '该文章已存在';
            trans_json($msg);
        }
        $p['raw_content'] = htmlspecialchars_decode($p['raw_content']);
        // Markdown?
        // 转化后的 HTML
        if (0 == $p['type']) {
            $p['content'] = self::parse_markdown($p['raw_content']);
        } else {
            $p['content'] = self::lazy_pic($p['raw_content']);
        }
        Db::table('blog_text')->insert($p);
        if_modify(1);
    }

    /**
     * @api {get} /Api?con=Admin_article&act=blog_text_info 博文内容：分页查看
     * @apiName blog_text_info
     * @apiGroup Admin_article
     *
     * @apiParam {string} to_page 页码，默认值为1
     *
     * @apiDescription  获取对应分页数据
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "cover_url": "",
     *     "descript": "",
     *     "type": "",
     *     "sticky": "",
     *     "original": "",
     *     "title": "",
     *     "id": "",
     *     "cate_name": ""
     *   }, ...],
     *   "page_count": "",
     *   "total": ""
     * }
     */
    public function blog_text_info()
    {
        $p = new \Mine\Page('
			Select cover_url, descript, type, sticky, original, a.title, a.id , b.title as cate_name
			From `blog_text` as a
			Left Join `blog_category_list` as b
			On b.`id` = a.`cate_id`
			Order By a.`id` Desc
			Limit ?,?
		', []);
        $p->is_render = false;
        $p->page_size = 10;
        $d            = $p->get_result();
        trans_json($d);
    }

    /**
     * @api {get} /Api?con=Admin_article&act=blog_text_search 博文内容：模糊搜索文章
     * @apiName blog_text_search
     * @apiGroup Admin_article
     *
     * @apiParam {string} title 文章名
     *
     * @apiDescription  依据文章标题、文章描述，模糊搜索文章 --- Q：有必要通过coreseek搜索吗？A：数据量目前2000条都没达到，连普通索引都可以不建
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "cover_url": "",
     *     "descript": "",
     *     "type": "",
     *     "sticky": "",
     *     "original": "",
     *     "title": "",
     *     "id": "",
     *     "cate_name": ""
     *   }, ...]
     * }
     */
    public function blog_text_search()
    {
        $g = Request::instance()->get();
        @Filter::is_set([
            $g['title'],
        ]);
        $title        = '%' . $g['title'] . '%';
        $_res['info'] = Db::query('
			Select cover_url, descript, type, sticky, original, a.title, a.id , b.title as cate_name
			From `blog_text` as a
			Left Join `blog_category_list` as b
			On b.`id` = a.`cate_id`
			Where a.`title` like ? or a.`descript` like ?
			Order By a.`id` Desc
			Limit 5
		', [$title, $title]);
        trans_json($_res);
    }

    /**
     * @api {post} /Api?con=Admin_article&act=blog_text_edit 博文内容：修改
     * @apiName blog_text_edit
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 文章编号
     * @apiParam {string} cate_id 对应文章分类
     * @apiParam {string} cover_url 封面图片url
     * @apiParam {string} title 标题
     * @apiParam {string} descript 文章概述
     * @apiParam {string} type 文本类型 0=>Markdown 1=>Editor
     * @apiParam {string} raw_content 未转为html之前的文章内容
     * @apiParam {string} sticky 置顶项[0=>未置顶、1=>置顶]
     * @apiParam {string} original [0=>原创,1=>转载]
     * @apiParam {string} bg_id 对应文章背景主题号【0=>没有背景主题】
     *
     * @apiDescription  添加博文
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function blog_text_edit()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['id'], // 主键
            $p['cate_id'], // 对应文章分类
            $p['cover_url'], // 封面图片url
            $p['title'], // 标题
            $p['descript'], // 文章概述
            $p['type'], // 文本类型 0=>Markdown 1=>Editor
            $p['raw_content'], // 未转为html之前的文章内容
            $p['sticky'], // 置顶项[0=>未置顶、1=>置顶]
            $p['original'], // [0=>原创,1=>转载]
            $p['bg_id'], //  对应文章背景主题号【0=>没有背景主题】
        ]);
        Filter::is_empty($p['title'], '你还没输入标题呢');
        Filter::is_empty($p['descript'], '别忘了输入文章概述');
        Filter::is_empty($p['cover_url'], '还有封面图没弄呢。');
        // 文章是否存在
        $_res = Db::query('
			Select `id`,`title`
			From `blog_text`
			Where `id`=?
		', [$p['id']]);
        if (count($_res)) {
            // 判断是否为当前文章
            if ($_res[0]['id'] != $p['id']) {
                $msg['out'] = '该文章已存在';
                trans_json($msg);
            }
        } else {
            $msg['Err'] = 1004;
            trans_json($msg);
        }
        $p['raw_content'] = htmlspecialchars_decode($p['raw_content']);
        // Markdown?
        // 转化后的 HTML
        if (0 == $p['type']) {
            $p['content'] = self::parse_markdown($p['raw_content']);
        } else {
            $p['content'] = self::lazy_pic($p['raw_content']);
        }
        Db::table('blog_text')->update($p);
        if_modify(1);
    }

    /**
     * @api {post} /Api?con=Admin_article&act=blog_text_del 博文内容：删除
     * @apiName blog_text_del
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 主键
     *
     * @apiDescription  删除对应博文内容
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function blog_text_del()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['id'], // 主键
        ]);
        Db::table('blog_text')->delete($p['id']);
        if_modify(1);
    }

    /**
     * @api {get} /Api?con=Admin_article&act=blog_text_find 博文内容：查看
     * @apiName blog_text_find
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 文章id
     *
     * @apiDescription  修改前，查看对应文章相关内容
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *     "bg_id": "",
     *     "bg_url": "",
     *     "cate_id": "",
     *     "cate_name": "",
     *     "content": "",
     *     "cover_url": "",
     *     "descript": "",
     *     "id": "",
     *     "last_time": "",
     *     "original": "",
     *     "raw_content": "",
     *     "statistic": "",
     *     "sticky": "",
     *     "time": "",
     *     "title": "",
     *     "type": ""
     *   }]
     * }
     */
    public function blog_text_find()
    {
        $g = Request::instance()->get();
        @Filter::is_set([
            $g['id'],
        ]);
        $_res['info'] = Db::query('
          Select a.*, b.`title` as `cate_name`, c.`url` as `bg_url`
          From `blog_text` as a
          Left Join `blog_category_list` as b
          On b.`id` = a.`cate_id`
          Left Join `background_list` as c
          On c.`id` = a.`bg_id`
          Where a.`id` = ?
        ', [$g['id']]);
        trans_json($_res);
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +        评论、留言[其他在Common_reply里]
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */

    /**
     * @api {post} /Api?con=Admin_article&act=comment_del 评论：删除
     * @apiName comment_del
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 主键
     *
     * @apiDescription  删除评论
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function comment_del()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['id'],
        ]);
        Db::table('blog_comment')->delete($p['id']);
        if_modify(1);
    }

    /**
     * @api {post} /Api?con=Admin_article&act=reply_del 回复：删除
     * @apiName reply_del
     * @apiGroup Admin_article
     *
     * @apiParam {string} id 主键
     *
     * @apiDescription  删除评论
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "status": true,
     * }
     */
    public function reply_del()
    {
        $p = Request::instance()->post();
        @Filter::is_set([
            $p['id'], // 主键
        ]);
        $id = Filter::int($p['id']);
        Db::table('blog_comment_reply')->delete($id);
        if_modify(1);
    }

    /**
     * @api {get} /Api?con=Admin_article&act=comment_list_main 评论：查看主楼
     * @apiName comment_list_main
     * @apiGroup Admin_article
     *
     * @apiParam {string} to_page 页码，默认值为1
     *
     * @apiDescription  分页获取主楼评论数据
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *   "id": "",
     *   "article_id": "",
     *   "time": "",
     *   "content": "",
     *   "title": "",
     *   "name": "",
     *   "pic": ""
     *   }, ...],
     *   "page_count": "",
     *   "total": ""
     * }
     */
    public function comment_list_main()
    {
        $p = new \Mine\Page('
			Select a.`id`, a.`article_id`, a.`time`, a.`content`,
					b.`title`,
					c.`name`, c.`pic`
			From `blog_comment` as a
			Left Join `blog_text` as b
			On b.`id` = a.`article_id`
			Inner Join `user` as c
			On c.`id`= a.`user_id`
			Order By a.`id` Desc
			Limit ?,?
		', []);
        $p->is_render = false;
        $d            = $p->get_result();
        trans_json($d);
    }

    /**
     * @api {get} /Api?con=Admin_article&act=comment_list_inner 评论：查看楼中楼
     * @apiName comment_list_inner
     * @apiGroup Admin_article
     *
     * @apiParam {string} to_page 页码，默认值为1
     *
     * @apiDescription  分页获取主楼评论数据
     *
     * @apiVersion 2.0.0
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "info": [{
     *   "article_id": "",
     *   "title": "",
     *   "name": "",
     *   "pic": "",
     *   "id": "",
     *   "floor_id": "",
     *   "time": "",
     *   "content": ""
     *   }, ...],
     *   "page_count": "",
     *   "total": ""
     * }
     */
    public function comment_list_inner()
    {
        $p = new \Mine\Page('
			Select  a.`article_id`,
					b.`title`,
					c.`name`,  c.`pic` ,
					d.`id`, d.`floor_id`, d.`time`, d.`content`
			From `blog_comment` as a
			Left Join `blog_text` as b
			On b.`id` = a.`article_id`
			Inner Join `blog_comment_reply` as d
			On d.`floor_id` = a.id
			Inner Join `user` as c
			On c.`id`= d.`user_id`
			Order By d.`id` Desc
			Limit ?,?
		', []);
        $p->is_render = false;
        $d            = $p->get_result();
        trans_json($d);
    }

}
