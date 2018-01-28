<?php
namespace app\service;

use think\Db;

class Index
{
    public function index($g)
    {
        // 最新、不同人的回复【5条】
        // 昵称、头像、时间、文章ID
        $_r1 = Db::query('
			Select *
			From  `index_comment`
			Order By `time` Desc
			Limit 5
		');
        // 所有分类以及数量
        $_r2 = Db::query('
			Select  a.*, count(b.id) as total
			From `blog_category_list` as a
			Inner Join `blog_text` as b
			On a.`id`= b.`cate_id`
			Where a.`id`!=0
			Group By b.`cate_id`
		');
        // 置顶文章所有
        // 标题、id
        $_r3 = Db::query('
			Select `id`,  `title`
			From `blog_text`
			Where `sticky`=1
			Order By `id` Desc
		');

        // 对应查询字段的数据
        $field = [];
        // 搜索功能
        if (isset($g['search'])) {
            $search = $g['search'] . '%';
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
        // 参数
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
        $_r4                   = $pagenation->get_result();

        // 友情链接
        $_r5 = Db::table('friend_link')
            ->order('title')
            ->select();
        return [
            "reply_list"    => &$_r1,
            "cate_list"     => &$_r2,
            "sticky_list"   => &$_r3,
            "article_list"  => &$_r4,
            "now_cate_info" => &$now_cate_info,
            "friend_link"   => &$_r5,
        ];
    }

}

// // 视图表
// create view index_comment as
//     (
//     Select a.`article_id`, a.`user_id`, a.`time`, a.`content`,
//     c.`name`, c.`pic`
//     From `blog_comment` as a
//     Left Join `blog_text` as b
//     On b.`id` = a.`article_id`
//     Inner Join `user` as c
//     On c.`id`= a.`user_id`
//     Order By a.`id` Desc
//     Limit 5
//     )
// UNION
// (
//     Select  a.`article_id`, d.`user_id`, d.`time`, d.`content`,
//     c.`name`,  c.`pic`
//     From `blog_comment` as a
//     Left Join `blog_text` as b
//     On b.`id` = a.`article_id`
//     Inner Join `blog_comment_reply` as d
//     On d.`floor_id` = a.id
//     Inner Join `user` as c
//     On c.`id`= d.`user_id`
//     Order By d.`id` Desc
//     Limit 5
// )
