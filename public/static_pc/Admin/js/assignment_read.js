// 客户评价 -> 分页 =>ok
function div_page_1(page_total) {
  var page_load_index = layer.load(0, {shade: false}); // 加载层 开启
  $("#this_page_1").cypager({
    pg_size: 15, // 每页显示记录数
    pg_nav_count: 7, //显示多少个导航数
    pg_total_count: page_total, // 总记录数
    pg_prev_name: "上一页", //上一页按钮名称（默认：PREV）
    pg_next_name: "下一页", //下一页按钮名称 (默认：NEXT)
    pg_call_fun: function(count) {
      $.ajax({
        "url": api("Admin_assignment", "get_user_ass"),
        "type": "post",
        "data": {
          "to_page": count,
          "option":"0"
        },
        "dataType": "json",
        "success": function(data) {
          async_render('yth_t1', 'this_tpl', data.info, function(){
            layer.close(page_load_index);// 加载层 关闭
            set_reply(); // 回复功能
            set_read(); // 设为已读
            yth_tr_del( api("Admin_assignment","del_user_ass") );
          });
        }
      });
    }
  });
  // 首次，自动触发分页
  document.getElementsByClassName("pg-selected")[0].click();
}

// 客服回复 -> 分页 =>ok
function div_page_2(page_total) {
  $("#this_page_2").cypager({
    pg_size: 15, // 每页显示记录数
    pg_nav_count: 7, //显示多少个导航数
    pg_total_count: page_total, // 总记录数
    pg_prev_name: "上一页", //上一页按钮名称（默认：PREV）
    pg_next_name: "下一页", //下一页按钮名称 (默认：NEXT)
    pg_call_fun: function(count) {
      $.ajax({
        "url": api("Admin_assignment", "get_user_ass"),
        "type": "post",
        "data": {
          "to_page": count,
          "option":"1"
        },
        "dataType": "json",
        "success": function(data) {
          async_render('yth_t2', 'this_read', data.info, function(){
            edit_reply(); // 回复功能
            set_read(); // 设为已读
            yth_tr_del( api("Admin_assignment","ass_del") , "#repaly_tr_", ".del_reply" );
            yth_tr_del( api("Admin_assignment","del_user_ass") );
          });
        }
      });
    }
  });
  // 首次，自动触发分页
  document.getElementsByClassName("pg-selected")[1].click();
}


// 模态框 => 回复内容
function set_reply() {
  $(".set_reply").unbind("click");
  $(".set_reply").on("click", function() {
    var it = $(this),
      id = it.attr('yth-data-id'),
      uid = it.attr('yth-data-uid');
    //prompt层
    var layer_index = layer.prompt({
      title: '请输入回复内容',
      formType: 2
    }, function(get_new_attr, index) {
      request_api(api('Admin_assignment', 'ass_replay'), {
        "uid":uid,
        "ass_id": id,
        "descript": get_new_attr
      }, 'tr_'+id,function(){
        layer.close(layer_index);
      } );
    });
  });
}
// 模态框 => 重写回复
function edit_reply() {
  $(".edit_reply").unbind("click"); // 清空之前的点击事件绑定
  $(".edit_reply").on("click", function() {
    var it = $(this),
      id = it.attr('yth-data-id');
    //prompt层
    var layer_index = layer.prompt({
      title: '请重写回复内容',
      formType: 2
    }, function(get_new_attr, index) {
      request_api(api('Admin_assignment', 'edit_admin_to_user_ass'), {
        "id": id,
        "descript": get_new_attr
      }, false,function(){
        layer.close(layer_index);
        $("#reply_descript_"+id).html(get_new_attr);
      } );
    });
  });
}

// 设为已读
function set_read(){
  $(".set_read").unbind("click"); // 清空之前的点击事件绑定
  $(".set_read").on("click",function(){
    var it = $(this),
      ass_id = it.attr('yth-data-id');
    request_api( api("Admin_assignment","set_ass_read"),{"ass_id":ass_id},'tr_'+ass_id );
  });
}

// 如果客服回复为空，返回字符串
function get_reply_content(str){
  if( ""==str ){
    return "已阅 - 未回复";
  }else{
    return str;
  }
}

// 如果用户没有回复
function get_user_content(str){
  if( ""==str ){
    return "已评分 - 未评论";
  }else{
    return str;
  }
}

