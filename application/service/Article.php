<?php
namespace app\service;

use think\Db;

class Article
{

    public function index($g)
    {
        if (!isset($g['id'])) {
            header('Location:/404.html');
            exit();
        }
        // [阅读量] + 1
        $this->article_statistic($g['id']);
        // [侧边] 所有分类以及数量
        $cate_list = Db::query('
			Select  a.*, count(b.id) as total
			From `blog_category_list` as a
			Inner Join `blog_text` as b
			On a.`id`= b.`cate_id`
			Where a.`id`!=0
			Group By b.`cate_id`
		');
        // [文章]
        $id = &$g['id'];
        // 如果是留言部分
        if ('0' === $id) {
            header('Location:/Board');
            exit();
        }
        $article_info = Db::query('
			Select 
                a.id,a.title, a.cate_id, a.original, a.content,
                a.statistic, a.time, a.type, a.descript,
				b.title as cate_name,
				c.`url` as `bg_url`
			From `blog_text` as a
			Inner Join `blog_category_list` as b
			On b.`id` = a.`cate_id`
			Left Join `background_list` as c
			On c.`id` = a.`bg_id`
			Where a.id=? And a.`cate_id`!=0
		', [intval($id)]);
        // [推荐同类文] 最多五篇
        if (count($article_info)) {
            // 当前文章所属分类
            $now_cate = &$article_info[0]['cate_id'];
            // 同理文章推荐
            // 同类文章数统计
            $alike_article_count = Db::query('
				Select count(*) as total
				From `blog_text`
				Where `cate_id`=?
			', [$now_cate]);
            $page_size  = 5;
            $count_page = ceil($alike_article_count[0]['total'] / $page_size);
            // 随机找一页用于统计
            $_GET['to_page'] = mt_rand(1, $count_page);
            $pagenation      = new \Mine\Page('
				Select `id`,  `title`
				From `blog_text`
				Where `cate_id`=?
				Order By `id` Desc
				Limit ?,?
			', [$article_info[0]['cate_id']]);
            $pagenation->page_size = $page_size;
            $recommands            = $pagenation->get_result()['info'];
        } else {
            header('Location: /404.html');
            exit();
        }
        // [统计评论] 主楼与楼中楼
        $commit_statistic = Db::query('
			Select sum(count) as total From
			(
				(
					Select count(*) as count
					From `blog_comment`
					Where `article_id`=?
				)
				Union ALL
				(
					Select count(*) as count
					From `blog_comment_reply`
					Where `floor_id` in (
						Select `id` as `floor_id`
						From `blog_comment`
						Where `article_id`=?
					)
				)
			) as tmp
		', [$id, $id]);
        return [
            'article_info' => &$article_info,
            'cate_list'    => &$cate_list,
            'recommands'   => &$recommands,
            'count_commit' => &$commit_statistic[0]['total'],
        ];
    }

    // 如果url是文章的url，则文章阅读量增1
    private function article_statistic($article_id)
    {
        // 如果是博主，不继续进行
        if (isset($_SESSION['user']['id']) && -1 == $_SESSION['user']['id']) {
            return;
        }
        Db::execute('
			Update `blog_text`
			Set `statistic` = `statistic`+1
			Where `id`=?
		', [$article_id]);
    }

    // 关于...
    public function about()
    {
        $info = Db::query('
			Select  descript,pic
			From admin_basic
		');
        return $info[0];
    }

}
