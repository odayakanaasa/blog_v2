// It is a Pjax Page
// JS function should be bind in html form for better control of JS event
var first_flag = true;
function show_render_container(get_module) {
	// To make sure it is not the first time to open this page
	if (first_flag) {
		first_flag = false;
		yth_pjax({
			selector:".yth-pjax"
		});
	}
}

// Return an icon of login method
var login_method_icon_src = function(this_type) {
	var pic_src, title, pic;
	switch ( parseInt(this_type) ) {
		case 0: // Blog owner
			pic_src = "/static/img/default/icon_v_yellow.png";
			title = "博主";
			pic = '<img class="login_method_icon"  src="' + pic_src + '" title="' + title + '">';
			break;
		case 1: // Sina
			title = "Sina 用户";
			pic = '<i class="fa fa-weibo" title="' + title + '"></i>';
			break;
		case 2: // QQ
			title = "QQ 用户";
			pic = '<i class="fa fa-qq" title="' + title + '"></i>';
			break;
	}
	return pic;
}
, auth_judge = function(run_func) {
    var page_load_index = layer.load(2, {shade: [0, 'none'] }); // 加载层 开启
	$.ajax({
		"url": api('Common_reply', 'check_auth'),
		"dataType": "json",
		"success": function(d) {
			layer.close(page_load_index); // 加载层 关闭
			hlz_alert.open("请在页面顶部右侧，点击图标登陆");
		},
		"error":function(){
			layer.close(page_load_index); // 加载层 关闭
			run_func();
		}
	})
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++
//++			Module - Field
//++++++++++++++++++++++++++++++++++++++++++++++++++++
;var blog_text = (function($){
	'use strict';
	var show_banner = function(){
		/* Compute banner Location */
		var _w = parseInt( $("body").width()  ),
			_mid ;
			_mid = Math.abs(  ( _w - 1920 )  / 2  );
			_w < 1920  ? _mid = '-' + _mid : '';
		$("#hide_box img").attr({"style":"left:"+_mid+"px"});
		// Show Banner
		$(".banner").fadeIn();
		console.log("_mid "+_mid);
	}
	return {
		"show_banner" : function(){
			show_banner();
		}
	};
})(jQuery)

, article = (function($){
	'use strict';
	var container_id = "markdown_container";
	// Render comments  in async  
	var get_comments_main = function(){
		var article_id = $("#markdown_container").attr("yth-article_id"),
			// Inner comments 
			callback_func = function(d){
				var data = d.info,
					len = data.length;
				for(var i=0 ; i<len ; i++ ){
					yth_pageination({
					    "api": api("Common_reply", "reply_info"),	// API的url
					    "send_other_data": {"floor_id":data[i].id},	// 发送其他 Get 数据
					    "render_tpl"  : "article_comment_reply_tpl",// 渲染前的html模板id
					    "render_html" : "floor_id_"+data[i].id,		// 目标渲染位置
					    "pageination_id": "reply_his_pagination_"+data[i].id, 	// 分页条的id
					    "loading_switch":false, // 是否显示加载特效
					});
				}
			};
		// Main comments 
		yth_pageination({
		    "api": api("Common_reply", "comment_info"),		// API的url
		    "send_other_data": {"article_id":article_id},// 发送其他 Get 数据
		    "render_tpl"  : "article_comment_tpl",			// 渲染前的html模板id
		    "render_html" : "article_comment",				// 目标渲染位置
		    "pageination_id": "article_comment_pagenation", // 分页条的id
		    "callback":callback_func, 		// 回调函数，根据callback_data 来判断是否获取回调数据
		    "callback_data" :true, 	// 是否传入API的数据到回调函数参数中
		    "loading_switch":false, // 是否显示加载特效
		});
	}
	// Init artile info
	, change_bg = function(pic_url){
		if(""!=pic_url){
			$(".show_container").css({
				"background":"none"
			});
			$("body").css({
				"background-image":"url("+pic_url+")",
				"background-attachment":"fixed",
				"background-size":"100% 100%",
				"background-repeat":"no-repeat"
			});
		}
	}
	, if_original = function(){
		// IF `original` eq 0  => it is an original pieces 
		var if_original = parseInt(  $("#yth_original").attr("yth_original")  );
		if( if_original ){
			var tmp_html = $("#yth_original").html()
				,from_others_logo = '[转载] ';
			$("#yth_original").html(from_others_logo+tmp_html);
		}
	}
	, create_catalog = function(){
		var h2_count=0, h3_count=0, h4_count=0
			,i=0,  j=0
			,content = document.getElementById(container_id).innerHTML
		// Get All title
			,titles  = content.match(/\<h[\d](?:.*?)\>(.*?)\<\/h[\d]\>/ig) || []
			,titles_len = titles.length 
			,temp_data
			,new_arr=[]
			,now_index;
		// Set its index
		for(;i<titles_len;i++){ 
			temp_data = titles[i].match(/\<h(\d)(?:.*?)\>(.*?)\<\/h[\d]\>/i);
			// Set index
			if( temp_data[1] < 2  || temp_data[1]>4 ){
				continue;
			}
			eval("now_index = "+"h"+temp_data[1]+"_count;");
			// Push handled data in a new array
			new_arr.push(
				'<h'+temp_data[1]+' yth_index='+now_index+' onclick="article.go_to_this_title(this)">'+
				temp_data[2]
				+'</h'+temp_data[1]+'>');
			// Tag ++ 
			eval("h"+temp_data[1]+"_count++");
		}
		// Push Array into html
		if( new_arr.length ){
			var render_html = new_arr.join('');
			$("#catalog").html(render_html);
			// Show
			$(".catalog").fadeIn();
		}
	}
	, go_to_this_title = function(this_obj){
		var this_tag 	= this_obj.tagName.toLowerCase()
			,this_index = this_obj.getAttribute("yth_index")
			,selector 	= "#"+container_id +" "+this_tag
		// Get position in this html
			,offset 	= $(selector).eq(this_index).offset().top;
		// Go there
		$("html,body").scrollTop(offset);
	}

	// Init some Function
	, create_open_img_page_event = function(){
		$("#markdown_container img").attr({
			"onclick" 	: "article.open_img_page_action(this)",
			"title" 	: "查看原图"
		});
	}
	, open_img_page_action = function(this_obj){
		window.open(  this_obj.getAttribute("src")  );
	}
	, open_href_in_new_window = function(){
		$("#markdown_container a").attr({"target":"_blank"});
	}
	, set_open_event = function(){
		create_open_img_page_event();
		open_href_in_new_window();
		create_catalog();
		if_original();
	}

	// Events 
	, reply_main_floor = function(this_obj){
		var id = $(this_obj).attr("yth_main_floor"),
			name = $(this_obj).attr("yth_name")
		layer.prompt({
			title: '请输入回复 <span style="color: #ba55d3;">@'+name+'</span> 的内容',
			formType: 2
		}, function(text, layer_index) {
			$.ajax({
				"url": api("Common_reply","reply_add"),
				"type": "post",
				"dataType": "json",
				"data": {
					"content": text,
					"floor_id": id
				},
				"success": function(msg) {
					if (msg.Err=='1014') {
						hlz_alert.open("请在页面顶部右侧，点击图标登陆");
					} else if (msg.status) {
						// Get this floor's list
						yth_pageination({
						    "api": api("Common_reply", "reply_info"),
						    "send_other_data": {"floor_id":id},
						    "render_tpl"  : "article_comment_reply_tpl",
						    "render_html" : "floor_id_"+id,	
						    "pageination_id": "reply_his_pagination_"+id, 
						    "loading_switch":false
						});
						layer.msg("回复成功！");
					}
					layer.close(layer_index);

				}
			});
		});
	}
	, reply_floor = function(this_obj){
		var article_id = $(this_obj).attr("yth-article_id");
		layer.prompt({
			title: "请输入内容",
			formType: 2
		}, function(text, layer_index) {
			$.ajax({
				"url": api("Common_reply","comment_add"),
				"type": "post",
				"dataType": "json",
				"data": {
					"content": text,
					"article_id": article_id
				},
				"success": function(msg) {
					if (msg.Err=='1014') {
						hlz_alert.open("请在页面顶部右侧，点击图标登陆");
					} else if (msg.status) {
						// Get this floor's list
						get_comments_main();
						layer.msg("评论成功！");
					}
					layer.close(layer_index);

				}
			});
		});
	}


	return{
		"get_comments_main":function(){
			get_comments_main();
		},
		"change_bg":function(a){
			change_bg(a);
		},
		"set_open_event":function(){
			set_open_event();
		},
		"open_img_page_action":function(a){
			open_img_page_action(a);
		},
		"go_to_this_title":function(a){
			go_to_this_title(a);
		},
		"reply_main_floor":function(a){
			auth_judge(function(){
				reply_main_floor(a);
			});
		},
		"reply_floor":function(a){
			auth_judge(function(){
				reply_floor(a);
			});
		}
	};
})(jQuery)

, board = (function($){
	'use strict';
	var message_list_add = function(){
		// Judge By page_count 
		var page_count = parseInt(  $("#message_list").attr("yth_page_count")  )
			,total = parseInt(  $("#message_list").attr("yth_total")  )
			,to_page = parseInt(  $("#message_list").attr("yth_to_page")   );
			to_page++;
			$("#message_list").attr({"yth_to_page":to_page});
			if( to_page <= page_count ){
				console.log(to_page);
				$.ajax({
					"url":api("Common_reply","comment_info"),
					"type":"get",
					"dataType":"json",
					"data":{
						"article_id":"0",
						"to_page":to_page
					},
					"success":function(d){
						var tpl = $("#message_list_tpl").html(),
							full_data = d.info;
						laytpl( tpl ).render( full_data, function(tpl_html){
							$("#message_list").append(tpl_html);
						});
					}
				})
			}
	}
	, reply_floor = function(){
		layer.prompt({
			title: "请留言内容",
			formType: 2
		}, function(text, layer_index) {
			$.ajax({
				"url": api("Common_reply","comment_add"),
				"type": "post",
				"dataType": "json",
				"data": {
					"content": text,
					"article_id": "0"
				},
				"success": function(msg) {
					if (msg.Err=='1014') {
						hlz_alert.open("请在页面顶部右侧，点击图标登陆");
					} else if (msg.status) {
						hlz_alert.open("评论成功~！您的评论将会在页面刷新时显示！");
					}
					layer.close(layer_index);

				}
			});
		});
	}
	return {
		"message_list_add":function(){
			message_list_add();
		},
		"reply_floor":function(){
			auth_judge(function(){
				reply_floor();
			});
		}

	}
})(jQuery)
;