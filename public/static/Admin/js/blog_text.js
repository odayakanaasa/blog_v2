// 删除文章
function blog_text_del(Object_this){
    yth_del(   api('Admin_article','blog_text_del'),  Object_this   );
}

// 初始化添加界面
function blog_text_add_init(){
    // 初始化editor
    async_render("blog_text_add_tpl","blog_text_add",{},function(){
        editor();
        markdown_editor();
        // 监听是否切换编辑器
        blog_text_editor();
    });
}

// 提交信息
function blog_text_add(){
    var type = parseInt(  $("#blog_text_type").val()  ),
        text ;
    if(type){
        text = $("#yth_editor").html();
    }else{
        // text = $("#markdown").val();
        text = $("#markdown .editormd-markdown-textarea").text();
    }
    if( parseInt($("#yth_editor").html().length)>16777215 ){
        layer.msg('当前文章字数已超过最大限制16777215！');
    }else{
        request_api(
            api("Admin_article","blog_text_add"),
            {
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

// 搜索界面
function blog_text_search(){
    var title = $("#search_title").val();
    yth_pageination({
        "api": api("Admin_article", "blog_text_search") + "&title="+title ,
        "render_tpl": "blog_text_tpl",
        "render_html": "yth_search_html",
        "pageination_id": "yth_page",
        "callback_data":true,
        "callback":function(d){
            if( d.info.length===0 ){
                console.log('d.info.length===0');
                layui.use(['layer'], function() {
                    layer.msg("暂无相关内容");
                    console.log('layer');
                    console.log(layer);
                });
            }else{
                console.log(d);
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
                 d.info
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

// 获取文章列表
function get_article_list() {
    yth_pageination({
        "api": api("Admin_article", "blog_text_info"),
        "render_tpl": "blog_text_tpl",
        "render_html": "pagenation_html",
        "pageination_id": "yth_page"
    });
}