var page = localStorage.getItem("dragon3") | parseInt( $("#get_page").val() ),
    page_count = 40,
    title = '龙族3';
    to_page();

// 页数
function to_page() {
    if(page==0){
        page = 1 ;
    }
    // 配置项
    var pic_src_prefix ,
        pic_src_suffix ,
        pic_href,
        pic_div;
    $("#container").html('');
    pic_src_suffix = '.jpg-mht.middle';
    // 每一段区域的解析规则如下
    //  47~  Now
    if (page>46){
        pic_src_prefix = 'http://mhpic.zymkcdn.com/comic/L/龙族Ⅲ/' + page + '话SM/'
    }
    // 46
    else if( page>45 ){
        pic_src_prefix = 'http://mhpic.zymkcdn.com/comic/L/龙族Ⅲ/' + page + '话GQ/';
    }else{
    // 1~ 45
        pic_src_prefix = 'http://mhpic.zymkcdn.com/comic/L/龙族Ⅲ/' + give_zero(page) + '话/';
    }

    for (var i = 1; i<page_count+1; i++) {
        pic_href = pic_src_prefix + i + pic_src_suffix;
        pic_div  = '<img id="img_' + i + '" src="' + pic_href + '" >';
        $("#container").append(pic_div);
    }
    pic_status_handle();
    document.title = title +"/第" + page + "话";
    // 如果可以本地存储
    if (window.localStorage) {
        if (localStorage.getItem("dragon3")) {
            $("#just_look").html('你上次看到第' + localStorage.getItem("dragon3") + '话');
        }
        localStorage.setItem("dragon3", page);
    }
    $("#get_page").val(page);
}

// 判断图片是否存在，不存在就自动移除dom
function pic_status_handle(){
    $("img").on("error",function(){
        $(this).remove();
    });
}

// 显示图片
$("#show").on("click", function() {
    page = parseInt($("#get_page").val());
    to_page();
});

// 下一页
$(".next").on("click", function() {
    document.getElementById("top").click();
    page = parseInt($("#get_page").val()) + 1;
    to_page();
});

// 返回顶部
$("#top").on("click", function() {
    $("body,html").animate({
        "scrollTop": "0px"
    });
});

// 小于10自动补零
function give_zero(now_page){
    if( now_page<10 ) {
        return "0"+now_page +"";
    }
    
    return now_page;
}