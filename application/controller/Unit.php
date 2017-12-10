<?php
/**
 * 接口测试
 */
namespace app\controller;

class Unit
{
    /**
     * 初始配置
     * @param Array  : not_require 不测试的函数
     * @param Boolean: if_out      false =>直接输出测试结果与耗时，不显示过程  true =>显示每个输出结果
     */
    private static $not_require = [
        // 基础库
        "__construct", "__destruct", "index", "encode", "url",
        // 已测试过的，注释即可全部跑一遍
        "pwd_edit", "basic_edit", "basic_info",
        // Admin_basic
        "friend_link_add", "friend_link_info", "friend_link_edit", "friend_link_del",
        "background_list_add", "background_list_info", "background_list_edit", "background_list_del",
        // Admin_article
        "blog_category_list_add", "blog_category_list_info", "blog_category_list_edit", "blog_category_list_del",
        // "blog_text_add",
        "blog_text_add", "blog_text_info", "blog_text_search", "blog_text_find", "blog_text_edit", "blog_text_del",
        // 留言与评论
        "comment_add", "comment_info", "reply_add", "reply_info", "comment_del", "reply_del",
        // 访客行为
        "user_behaviour_add", "user_behaviour_info", "user_deny_ip_info", "user_info",
    ];

    private static $if_out = true;

    // 接口测试，输出结果
    public function index()
    {
        $class_names = get_class_methods(__CLASS__);
        // 取剩下的数组
        $for_test = array_diff($class_names, self::$not_require);
        ob_start();
        $temp_html = ''; // 存储临时值
        // 测试开始
        $start_time = microtime(true);
        foreach ($for_test as $k => $v) {
            $temp_html = $this->$v();
            // 出现异常？
            if (preg_match('/think\exception/s', $temp_html)) {
                ob_clean();
                echo $temp_html; // 输出异常
                exit();
            } else {
                if (self::$if_out) {
                    echo '<h3>Func: <font color="orange">' . $v . '</font></h3>';
                    out(json_decode($temp_html, true));
                    // out( $temp_html ,2 ); // 若json_decode没有输出值，则说明该快可能有问题
                }
            }
        }
        $end_time = microtime(true);
        // 测试结束
        if (!self::$if_out) {
            // 输出耗时
            $use_time = $end_time - $start_time;
            echo '<h5>总耗时: <font color="orange">' . $use_time . '</font> 秒</h5>';
            echo '<font color="#EE00EE">当前API全部通过测试所</font>';
        }
    }

    //++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++                Admin_basic
    //++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function pwd_edit()
    {
        $d['new_pwd'] = $this->encode('123123');
        $d['re_pwd']  = $this->encode('123123');
        $d['name']    = $this->encode('admin');
        $url          = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url, $d);
    }
    // 测试登陆
    public function basic_edit()
    {
        $d['info_pic']  = 'http://ww1.sinaimg.cn/large/006HJ39wgy1fg166thfzbj305k05k746.jpg';
        $d['reply_pic'] = 'http://tva1.sinaimg.cn/crop.0.0.640.640.180/65c897f9jw8faclt19le1j20hs0hsdgl.jpg';
        $d['descript']  = '<p>
            一个偶然的原因，我到了计算机这个专业，很庆幸，这个专业恰好是我所喜欢的。 大二上学期，我一感觉到无聊，就会来触碰这个，关于前端，关于PHP。在某一个清晨，我看到杨青的博客，让我突然有种想写一个博客的冲动，恰逢其时，腾讯云服务器搞学生特惠，我就写了这个博客。 关于这个博客，我的初心是，将之前学到的东西，都尽量用进来，写原生是最好，避免以后习惯了用框架写这些，却忘了它一些核心的东西。 这个博客，用了些jquery、原生与jquery的ajax、当然也有基于jquery的幻灯片切换图片的coin-slider与图片延时的lyz.delayLoading插件、伪静态。 页面的设计灵感源于我对博客理解。 如有什么问题，请将内容发送到下方的邮箱或留言。
        	</p>';
        $url = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url, $d);
    }
    public function basic_info()
    {
        $url = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url);
    }

    public function friend_link_add()
    {
        $p['id']    = 1;
        $p['title'] = '云天河商城 - v2.0';
        $p['url']   = 'http://mall.hlzblog.top/';
        $url        = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function friend_link_info()
    {
        $url = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url);
    }
    public function friend_link_edit()
    {
        $p['id']    = 1;
        $p['title'] = '云天河博客 - v2.0';
        $p['url']   = 'http://www.hlzblog.top/';
        $url        = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function friend_link_del()
    {
        $p['id'] = 1;
        $url     = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }

    public function background_list_add()
    {
        $p['id']  = 1;
        $p['url'] = 'http://i1.piimg.com/567571/04334588f8d3024f.jpg';
        $url      = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        $u1       = curl_request($url, $p);
        $p['id']  = 2;
        $p['url'] = 'test.jpg';
        $url      = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        $u2       = curl_request($url, $p);
        return $u1 . $u2;
    }
    public function background_list_info()
    {
        $url = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__ . '&to_page=1');
        return curl_request($url);
    }
    public function background_list_edit()
    {
        $p['id']  = 1;
        $p['url'] = 'http://i4.buimg.com/567571/c84a9cfcff952ded.png';
        $url      = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function background_list_del()
    {
        $p['id'] = 1;
        $url     = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        $u1      = curl_request($url, $p);
        $p['id'] = 2;
        $url     = $this->url('/Api?con=Admin_basic&act=' . __FUNCTION__);
        $u2      = curl_request($url, $p);
        return $u1 . $u2;
    }

    //++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++                Admin_article
    //++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function blog_category_list_add()
    {
        $p['id']    = 1;
        $p['title'] = '心路历程';
        $url        = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function blog_category_list_info()
    {
        $url = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url);
    }
    public function blog_category_list_edit()
    {
        $p['id']    = 1;
        $p['title'] = '杂文';
        $url        = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function blog_category_list_del()
    {
        $p['id'] = 1;
        $url     = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }

    public function blog_text_add()
    {
        $p['id']          = 1;
        $p['cate_id']     = 1; // 对应文章分类
        $p['cover_url']   = 'http://i1.piimg.com/567571/2a51ea4fa1c03f8a.jpg'; // 封面图片url
        $p['title']       = '这是第一篇文章';
        $p['descript']    = '身边撸码低效的小伙伴，大致为两种 ...'; // 文章概述
        $p['type']        = 0; // 文本类型 0=>Markdown 1=>Editor
        $p['raw_content'] = '
			### 关于高效地撸码
			我觉得这都是习惯的问题 <br>
			##### A.遇到稍复杂的逻辑时 <br>
			身边撸码低效的小伙伴，大致为两种 <br>

			> 这个逻辑很复杂，我怎么可能能逻辑出来呢
			>
			>> [结果] => 思考半天后，直接放弃
			>
			> 这个逻辑其实还好，我直接写代码吧，想到哪里写到哪里吧
			>
			>> [结果] => 耗时长，效率低

			云天河的方式：
			> 逻辑模块化
			>
			>> 把一个比较大的任务，分解为一个个的任务点
			>
			> 任务意识
			>
			>> 预估任务需要的时间，规定任务完成时间。
			>
			>>> [超时] => 走向下一个模块，待全部处理完后，再回到未完成模块
			>
			> 代码思维化
			>
			>> [前端] => 右脑思维 => 先画草图
			>
			>> [后端] => 左脑思维 => 使用缩进风格，书写某个逻辑块的大致步骤 <br>![](http://i4.buimg.com/567571/53eda87e733329ef.png)
			';
        $p['sticky']   = 0; // 置顶项[0=>未置顶、1=>置顶]
        $p['original'] = 0; // [0=>原创,1=>转载]
        $p['bg_id']    = 0; //  对应文章背景主题号【0=>没有背景主题】
        $url           = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function blog_text_info()
    {
        $url = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url);
    }
    public function blog_text_search()
    {
        $g['title'] = '这是';
        $g_str      = '&' . http_build_query($g);
        $url        = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__ . $g_str);
        return curl_request($url);
    }
    public function blog_text_find()
    {
        $url = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__ . '&id=1');
        return curl_request($url);
    }
    public function blog_text_edit()
    {
        $p['id']          = 1;
        $p['cate_id']     = 1; // 对应文章分类
        $p['cover_url']   = 'http://i1.piimg.com/567571/2a51ea4fa1c03f8a.jpg'; // 封面图片url
        $p['title']       = '这是第二篇文章';
        $p['descript']    = '身边撸码低效的小伙伴，大致为两种 ...'; // 文章概述
        $p['type']        = 1; // 文本类型 0=>Markdown 1=>Editor
        $p['raw_content'] = '
			<blockquote>
			  <p>逻辑模块化</p>

			  <blockquote>
			    <p>把一个比较大的任务，分解为一个个的任务点</p>
			  </blockquote>

			  <p>任务意识</p>

			  <blockquote>
			    <p>预估任务需要的时间，规定任务完成时间。</p>

			    <blockquote>
			      <p>[超时] =&gt; 走向下一个模块，待全部处理完后，再回到未完成模块</p>
			    </blockquote>
			  </blockquote>

			  <p>代码思维化</p>

			  <blockquote>
			    <p>[前端] =&gt; 右脑思维 =&gt; 先画草图</p>

			    <p>[后端] =&gt; 左脑思维 =&gt; 使用缩进风格，书写某个逻辑块的大致步骤 <br><img src="http://i4.buimg.com/567571/53eda87e733329ef.png" alt="" src="http://i4.buimg.com/567571/53eda87e733329ef.png" style="display: inline;"></p>
			  </blockquote>
			</blockquote>
			';
        $p['sticky']   = 1; // 置顶项[0=>未置顶、1=>置顶]
        $p['original'] = 0; // [0=>原创,1=>转载]
        $p['bg_id']    = 0; //  对应文章背景主题号【0=>没有背景主题】
        $url           = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function blog_text_del()
    {
        $p['id'] = 1;
        $url     = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }

    //++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++                留言与评论
    //++++++++++++++++++++++++++++++++++++++++++++++++++++
    // 开始时，得添加一篇文章
    public function comment_add()
    {
        $this->blog_text_add();
        $p['id']         = 1;
        $p['article_id'] = 1;
        $p['content']    = '这是第一次留言';
        $url             = $this->url('/Api?con=Common_reply&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function comment_info()
    {
        $g['to_page']    = 1;
        $g['article_id'] = 1;
        $g_str           = '&' . http_build_query($g);
        $url             = $this->url('/Api?con=Common_reply&act=' . __FUNCTION__ . $g_str);
        return curl_request($url);
    }
    public function reply_add()
    {
        $p['id']       = 1;
        $p['floor_id'] = 1;
        $p['content']  = '这是第一次回复';
        $url           = $this->url('/Api?con=Common_reply&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function reply_info()
    {
        $g['to_page']  = 1;
        $g['floor_id'] = 1;
        $g_str         = '&' . http_build_query($g);
        $url           = $this->url('/Api?con=Common_reply&act=' . __FUNCTION__ . $g_str);
        return curl_request($url);
    }
    public function comment_del()
    {
        $p['id'] = 1;
        $url     = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    // 结束时，得删除这篇文章
    public function reply_del()
    {
        $this->blog_text_del();
        $p['id'] = 1;
        $url     = $this->url('/Api?con=Admin_article&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }

    //++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++                访客行为
    //++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function user_behaviour_add()
    {
        $p['url'] = 'http://web.blog.com/test/session';
        $url      = $this->url('/Api?con=Common_behaviour&act=' . __FUNCTION__);
        return curl_request($url, $p);
    }
    public function user_behaviour_info()
    {
        $g['to_page'] = 1;
        $g_str        = '&' . http_build_query($g);
        $url          = $this->url('/Api?con=Admin_behaviour&act=' . __FUNCTION__ . $g_str);
        return curl_request($url);
    }
    public function user_deny_ip_info()
    {
        $g['to_page'] = 1;
        $g_str        = '&' . http_build_query($g);
        $url          = $this->url('/Api?con=Admin_behaviour&act=' . __FUNCTION__ . $g_str);
        return curl_request($url);
    }
    public function user_info()
    {
        $g['to_page'] = 1;
        $g_str        = '&' . http_build_query($g);
        $url          = $this->url('/Api?con=Admin_behaviour&act=' . __FUNCTION__ . $g_str);
        return curl_request($url);
    }

    /**
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
    +                  需要的类库
    ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    private function encode($str)
    {
        return \Crypt\Rsa::encrypt(urlencode($str));
    }

    private function url($str)
    {
        return config('now_host') . $str;
    }

}
