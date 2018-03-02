// 读取列表
function get_list(){
  var page_load_index = layer.load(0, {shade: false}); // 加载层 开启
  $.ajax({
    "url":api("Admin_article","blog_category_list_info"),
    "type":"post",
    "dataType":"json",
    "async":"false",
    "success":function(msg){
      async_render("yth_t1","yth_show_list",msg.info,function(){
        layer.close(page_load_index);// 加载层 关闭
        // 删除
        del_categroy();
        // 修改
        modify_categroy();
        // 添加
        add_categroy();
      });
    }
  });
}

// 删除分类
function del_categroy() {
  $(".act_del").on("click", function() {
    var it = $(this),
      id = it.attr('yth-data-id'),
      fid = it.attr('yth-data-fid');
    layer.confirm('你真的要删除吗', {
      btn: ['确认', '取消'] //按钮
    }, function() {
      $.ajax({
        "url": api('Admin_article', 'blog_category_list_del'),
        "data": {
          "id": id
        },
        "type": "post",
        "dataType": "json",
        "success": function(msg) {
          if (msg.out) {
            layer.msg(msg.out, {
              "time": 2000
            });
          } else if (msg.status) {
            layer.msg('删除成功', {
              "time": 2000
            });
            $(".tr_fid_" + id).fadeOut();
            $(".tr_" + id).fadeOut();
          }
        }
      });
    });
  });
}

// 修改分类
function modify_categroy() {
  $(".act_edit").on("click", function() {
      var it = $(this),
        id = it.attr('yth-data-id');
      layer.prompt({
          title: '请重新入新的分类名',
          formType: 3
        }, function(text, index) {
          $.ajax({
            "url": api("Admin_article", "blog_category_list_edit"),
            "type": "post",
            "dataType": "json",
            "data":{
              "title":text,
              "id":id
            },
            "success": function(msg) {
              if (msg.out) {
                layer.msg(msg.out, {
                  "time": 2000
                });
              } else if (msg.status) {
                window.location.reload();
                layer.close(index);
              }
            }
          });


      });
  });
}

// 添加分类
function add_categroy(){
  $(".act_add").on("click", function() {
      var it = $(this),
        fid = it.attr('yth-data-fid');
      layer.prompt({
          title: '请输入分类名',
          formType: 3
        }, function(text, index) {
          $.ajax({
            "url": api("Admin_article", "blog_category_list_add"),
            "type": "post",
            "dataType": "json",
            "data":{
              "title":text
            },
            "success": function(msg) {
              if (msg.out) {
                layer.msg(msg.out, {
                  "time": 2000
                });
              } else if (msg.status) {
                window.location.reload();
                layer.close(index);
              }
            }
          });


      });
  });
}