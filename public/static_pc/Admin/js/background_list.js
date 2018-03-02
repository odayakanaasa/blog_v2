
// 删除分类
function del_background(this_obj) {
  var it = $(this_obj),
    id = it.attr('yth-data-id');
  layer.confirm('你真的要删除吗', {
    btn: ['确认', '取消'] //按钮
  }, function() {
    $.ajax({
      "url": api('Admin_basic', 'background_list_del'),
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
          $(".tr_" + id).fadeOut(
            'normal',
            function(){
              $(".tr_" + id).remove();
            }
          );
        }
      }
    });
  });
}

// 修改链接
function modify_background(this_obj) {
  var it = $(this_obj),
    id = it.attr('yth-data-id');
  layer.prompt({
    title: '请重新输入图片地址',
    formType: 3
  }, function(text, index) {
    $.ajax({
      "url": api("Admin_basic", "background_list_edit"),
      "type": "post",
      "dataType": "json",
      "data": {
        "url": text,
        "id": id
      },
      "success": function(msg) {
        if (msg.out) {
          layer.msg(msg.out, {
            "time": 2000
          });
        } else if (msg.status) {
          $(".img_"+id).attr({"src":text});
          layer.close(index);
        }
      }
    });
  });
}

// 添加
function add_background(){
  layer.prompt({
    title: '请输入图片链接',
    formType: 3
  }, function(text, index) {
    $.ajax({
      "url": api("Admin_basic", "background_list_add"),
      "type": "post",
      "dataType": "json",
      "data": {
        "url": text
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
}