<?php
define("Sina_ROOT", dirname(__FILE__) . "/");
require_once (Sina_ROOT . "saetv2.ex.class.php");
Class Oauth_API {
    /**
     * 返回登陆信息
     * @return Array
     */
    public function get_info() {
        $_config = require Sina_ROOT . 'config.php';
        if ($_SESSION['token']) { // 传了cookie之后，重新获取信息
            $c = new SaeTClientV2($_config['WB_AKEY'], $_config['WB_SKEY'], $_SESSION['token']["access_token"]);
            $uid_get = $c->get_uid();
            $uid = $uid_get['uid'];
            $user_message = $c->show_user_by_id($uid); //根据ID获取用户等基本信息
            return $user_message;
        }
        $o = new SaeTOAuthV2($_config['WB_AKEY'], $_config['WB_SKEY']);
        if (isset($_REQUEST['code'])) {
            $keys = array();
            $keys['code'] = $_REQUEST['code'];
            $keys['redirect_uri'] = $_config['WB_CALLBACK_URL'];
            $token = $o->getAccessToken('code', $keys);
        } else {
            // exit("登陆失败");
            return false;
        }
        if ($token) {
            $_SESSION['token'] = $token;
            // 因为要传cookie，所以至少要刷新一次页面
            setcookie('weibojs_' . $o->client_id, http_build_query($token));
            header('Location:'.$_SERVER['REQUEST_URI'] );
            exit();
        } else {
            // exit('token获取失败');
            return false;
        }
    }
    /**
     * 第三方登陆地址
     * @return String
     */
    public function to_url() {
        $_config = require Sina_ROOT . 'config.php';
        $o = new SaeTOAuthV2($_config['WB_AKEY'], $_config['WB_SKEY']);
        $code_url = $o->getAuthorizeURL($_config['WB_CALLBACK_URL']);
        return $code_url;
    }
}
/* 来自  云天河Blog  http://hlzblog.top/
* 示例返回

Array
(
    [id] => 用户在新浪的id
    [idstr] => 用户在新浪的id
    [class] => 1
    [screen_name] => 潇涯icon
    [name] => 潇涯icon
    [province] => 50
    [city] => 7
    [location] => 重庆 九龙坡区
    [description] => 
    [url] => 
    [profile_image_url] => http://tva1.sinaimg.cn/crop.0.0.640.640.50/65c897f9jw8faclt19le1j20hs0hsdgl.jpg
    [profile_url] => u/用户在新浪的id
    [domain] => 
    [weihao] => 
    [gender] => m
    [followers_count] => 51
    [friends_count] => 10
    [pagefriends_count] => 0
    [statuses_count] => 6
    [favourites_count] => 0
    [created_at] => Mon Aug 02 13:02:30 +0800 2010
    [following] => 
    [allow_all_act_msg] => 
    [geo_enabled] => 1
    [verified] => 
    [verified_type] => -1
    [remark] => 
    [insecurity] => Array
        (
            [sexual_content] => 
        )

    [status] => Array
        (
            [created_at] => Sat Mar 04 00:14:58 +0800 2017
            [id] => 4.0813691580637E+15
            [mid] => 4081369158063672
            [idstr] => 4081369158063672
            [text] => [笑cry]
            [source_allowclick] => 0
            [source_type] => 1
            [source] => iPhone客户端
            [favorited] => 
            [truncated] => 
            [in_reply_to_status_id] => 
            [in_reply_to_user_id] => 
            [in_reply_to_screen_name] => 
            [pic_urls] => Array
                (
                )

            [geo] => 
            [annotations] => Array
                (
                    [0] => Array
                        (
                            [mapi_request] => 1
                        )

                )

            [reposts_count] => 0
            [comments_count] => 0
            [attitudes_count] => 0
            [isLongText] => 
            [mlevel] => 0
            [visible] => Array
                (
                    [type] => 0
                    [list_id] => 0
                )

            [biz_feature] => 0
            [hasActionTypeCard] => 0
            [darwin_tags] => Array
                (
                )

            [hot_weibo_tags] => Array
                (
                )

            [text_tag_tips] => Array
                (
                )

            [userType] => 0
            [positive_recom_flag] => 0
            [gif_ids] => 
            [is_show_bulletin] => 2
        )

    [ptype] => 0
    [allow_all_comment] => 1
    [avatar_large] => http://tva1.sinaimg.cn/crop.0.0.640.640.180/65c897f9jw8faclt19le1j20hs0hsdgl.jpg
    [avatar_hd] => http://tva1.sinaimg.cn/crop.0.0.640.640.1024/65c897f9jw8faclt19le1j20hs0hsdgl.jpg
    [verified_reason] => 
    [verified_trade] => 
    [verified_reason_url] => 
    [verified_source] => 
    [verified_source_url] => 
    [follow_me] => 
    [online_status] => 0
    [bi_followers_count] => 4
    [lang] => zh-cn
    [star] => 0
    [mbtype] => 0
    [mbrank] => 0
    [block_word] => 0
    [block_app] => 0
    [credit_score] => 80
    [user_ability] => 1024
    [urank] => 9
)

*/
