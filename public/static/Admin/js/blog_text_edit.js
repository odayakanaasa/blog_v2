var article_id ,
    article_data; // 两变量全局使用，方便操作，无需input存储数据
// 如果存在，就显示页面。
function if_exists() {
    // 获取 当前文章 id
    var id_arr = location.search.match(/id=(\d+)/);
    // 如果文章不存在
    if (id_arr.length && id_arr.length == 2) {
        article_id = id_arr[1];
        // 初始化数据
        $.ajax({
            "url": api("Admin_article", "blog_text_find") + "&id=" + article_id,
            "dataType": "json",
            "success": function(d) {
                if (d.info.length) {
                    // 初始化，添加界面
                    async_render("blog_text_div_tpl", "blog_text_div", d.info[0], function() {
                        // 渲染成功后，赋值到全局变量
                        article_data = d.info[0];
                        // 初始化，添加界面 => 分类 
                        blog_text_category();
                        // 初始化，添加界面 => 背景列表
                        blog_text_bg();
                        // 初始化其他数据
                        blog_text_init_auto();
                    });
                } else {
                    $("#blog_text_div").html('<h3>文章ID不正确！</h3>');
                }
            }
        });
    } else {
        $("#blog_text_div").html('<h1 >文章ID不正确！</h1>');
    }
}

// 删除文章
function blog_text_del(Object_this){
    yth_del(   api('Admin_article','blog_text_del'),  Object_this   );
}

// 提交信息
function blog_text_div(){
    var type = parseInt(  $("#blog_text_type").val()  ),
        text ;
    if(type){
        text = $("#yth_editor").html();
    }else{
        text = $("#markdown").val();
    }
    if( parseInt($("#yth_editor").html().length)>65535 ){
        layer.msg('当前文章字数已超过最大限制65535！');
    }else{
        request_api(
            api("Admin_article","blog_text_edit"),
            {
                "id"        : article_id,
                "title"     : $("#blog_text_title").val(),
                "raw_content": text,
                "descript"  : $("#blog_text_descript").val(),
                "type"      : type,
                "sticky"    : $("#blog_text_sticky").val(),
                "original"  : $("#blog_text_original").val(),
                "cate_id"   : $("#blog_text_cate_id").val(),
                "bg_id"     : $("#blog_text_bg_id").val(),
                "cover_url" : $("#blog_text_cover_url").val()
            }
        );
    }
}
/**
* 初始化已编辑 数据
*/
function blog_text_init_auto(){
    // 文本类型 、 编辑器 与 内容
    if( "1"==article_data.type ){
        $("#blog_text_type").parent().click();
        $("#yth_editor").html(article_data.raw_content);
    }else{
        $("#markdown").val(article_data.raw_content);
    }
    // 置顶操作
    if( "1"==article_data.sticky ){
        $("#blog_text_sticky").parent().click();
    }
    // 作品来源
    if( "1"==article_data.original ){
        $("#blog_text_original").parent().click();
    }
    
}

// 背景图
function blog_text_bg() {
    yth_pageination({
        "api": api("Admin_basic", "background_list_info"),
        "render_tpl": "blog_text_bg_tpl",
        "render_html": "blog_text_bg_html",
        "pageination_id": "blog_text_bg_html_pagenation",
        "callback": function() {
            // 所属背景图
            if (article_data.bg_id) {
                // 实时值，存在于全局变量中的bg_id中
                $("#blog_text_bg_id").val(article_data.bg_id);
                var this_bg = $("#blog_text_bg_id").val();
                // 如果已经不是默认的初始值 如果值也有改动，修改 全局变量中的 bg_id
                if (this_bg != 0 && this_bg != article_data.bg_id) {
                    article_data.bg_id = this_bg;
                }
                // 值已经改变？
                if (article_data.bg_id == this_bg) {
                    article_data.bg_id = this_bg;
                }
                //
                $("#blog_text_bg_html div[yth-id=" + article_data.bg_id + "]").click();
            }
        }
    });
}





// 分类：初始化
function blog_text_category(){
    $.ajax({
        "url":api("Admin_article","blog_category_list_info"),
        "dataType":"json",
        "success":function(d){
            async_render(
                "blog_text_category_tpl", 
                "blog_text_category_html",
                 d.info,
                 function(){
                    // 所属分类
                    if( article_data.cate_id ){
                        $("#blog_text_category_html div[yth-id="+article_data.cate_id+"]").click();
                    }
                    editor();
                 }
            );
        }
    });
}
// 编辑器切换
function blog_text_editor(this_obj) {
    var it = $(this_obj).find("input"),
        status = parseInt(it.val()),
        another = (status + 1) % 2;
    $("#Editor_" + status).show();
    $("#Editor_" + another).hide();
}