// 问候语，早中午晚
;
(function () {
  function greetings() {
    var now = new Date(),
      hour = now.getHours();
    if(hour < 6) {
      return "凌晨好！";
    } else if(hour < 9) {
      return "早上好！";
    } else if(hour < 12) {
      return "上午好！";
    } else if(hour < 14) {
      return "中午好！";
    } else if(hour < 17) {
      return "下午好！";
    } else if(hour < 19) {
      return "傍晚好！";
    } else if(hour < 24) {
      return "晚上好！";
    } else {
      return "午夜好！";
    }
  }
  $("#hello_user").html(greetings());
})();

// 注销
$("#admin_log_out").on("click", function () {
  $.ajax({
    "url": api("Admin_basic", "logout"),
    "type": "get",
    "async": "false",
    "dataType": "json",
    "success": function (msg) {
      if(msg.status) {
        window.location.href = url("/Admin");
      } else {
        layui.use('layer', function () {
          var layer = layui.layer;
          layer.msg('注销失败', {
            time: 3000
          });
        });
      }
    }
  });
});

/**
 * 请求Api [修改、删除]
 * String url 接口地址
 * Json   post数据  | String JQ来serialize的数据
 * String 删除时，淡出的id，默认不启用
 * String 回调函数 [成功时才可调用]
 */
function request_api(url, json_data, fadeOut_Selector = false, func = false) {
  // 耗时较长的，用加载层动画
  var shadow_index = layer.load(4, {
    shade: [0, 'none'] // 遮盖 透明度、背景
  });
  $.ajax({
    "url": url,
    "type": "post",
    "data": json_data,
    "dataType": "json",
    "success": function (d) {
      layer.close(shadow_index);
      if(d.out || d.detail) {
        if(d.detail) {
          layer.alert(d.detail);
        } else {
          layer.alert(d.out);
        }
      } else if(d.status) {
        layer.msg('操作成功', {
          time: 2000
        });
        if(fadeOut_Selector) {
          $(fadeOut_Selector).fadeOut('normal', function () {
            $(fadeOut_Selector).remove();
          });
        }
        if(func) {
          func();
        }
      } else if(d.Err == 1004) {
        layer.msg("您还有忘填了的信息哟", {
          time: 2000
        });
      } else {
        layer.msg("您的内容并无变化", {
          time: 2000
        });
      }
    }
  });
}
/**
 * 删除 yth-id 中的数据
 * String  接口地址
 * Obejcet 当前this对象
 * String  选择器前缀
 * Func   回调函数，成功后可使用
 */
function yth_del(url, obj, selector_prefix = ".tr_", func = false) {
  var id = $(obj).attr('yth-id');
  var confirm_index = layer.confirm('你真的要删除吗', {
    btn: ['是的', '不了'] // 按钮
  }, function () {
    layer.close(confirm_index);
    var shadow_index = layer.load(0, {
      shade: [0, 'none'] // 遮盖 透明度、背景
    });
    $.ajax({
      "url": url,
      "type": "post",
      "dataType": "json",
      "data": {
        "id": id
      },
      "success": function (msg) {
        layer.close(shadow_index);
        if(msg.status) {
          var its_selector = selector_prefix + id;
          $(its_selector).fadeOut('normal', function () {
            $(its_selector).remove();
          });
          if(false != func) {
            func();
          }
        } else {
          layer.msg("删除失败");
        }
      }
    });
  });
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++ UMEditor Link : http://ueditor.baidu.com/website/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
/** 富文本编辑器相关 
 * Boolean  false=>实例化编译器 true=>获取编译内容结果
 * Boolean  false=>设置默认id为Editor实例化 true=>设置对应id为Editor实例化
 * Array    设置菜单显示列表
 */
function editor(if_get_content = false, set_container_id = false, set_menu = false) {
  var container_id = false == set_container_id ? 'yth_editor' : set_container_id;
  if(false == if_get_content) {
    UM.getEditor(container_id);
  } else {
    return $("#" + container_id).html();
  }
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// Editor.md Link: https://github.com/pandao/editor.md/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
function markdown_editor() {
  var editor = editormd({
    width: 1100,
    height: 650,
    id: "markdown",
    path: "/static/plugins/editor_md/lib/",
    toolbarIcons: function () {
      // Or return editormd.toolbarModes[name]; // full, simple, mini
      // Using "||" set icons align right.
      return [
        "search",
        "preformatted-text",
        "||",
        "help",
        "watch",
        "image",
        "preview", 
      ];
    },
    editorTheme : "tomorrow-night-eighties",
    htmlDecode : "", // 上传时，不解析为html代码
    imageUpload: true,
    imageFormats: ["jpg", "jpeg", "gif", "png"],
    imageUploadURL: "/Api?con=Editor&act=pic&editor_type=0",
  });
}

/**
 * 滑动开关逻辑
 * String   当前id名
 */
function yth_check_box_click(this_obj) {
  var it = $(this_obj).find("input"),
    status = parseInt(it.val()),
    now_class = 'layui-form-onswitch';
  status = (status + 1) % 2;
  // 切换样式
  1 == status ? $(this_obj).addClass(now_class) : $(this_obj).removeClass(now_class);
  // 切换数据
  it.val(status);
  // 切换名字
  var btn_name = $(this_obj).attr("yth-check_box"),
    btn = btn_name.split('|');
  $(this_obj).find("em").html(btn[status]);
}

/**
 * 滑动开关，初始化
 * Boolean  true => 开启  false => 状态为关闭  
 * String   input 字段名
 * String   按钮名字
 */
function yth_check_box_html(status = 0, input_name = '', btn_name = "关闭|开启", func = false) {
  var btn = btn_name.split('|'),
    str = '',
    switch_div = [
      '',
      ' layui-form-onswitch '
    ];
  if(func) {
    func = func + '(this);';
  } else {
    func = '';
  }
  // 预留切换数据
  str = '\
        <div class="layui-unselect layui-form-switch ' + switch_div[status] + '" \
            lay-skin="switch" yth-check_box="' + btn_name + '" \
            onclick="yth_check_box_click(this);' + func + '"> \
            <input type="hidden" id="' + input_name + '" value="' + status + '">\
            <em>' + btn[status] + '</em> <i></i>\
        </div>';
  return str;
}

/**
 * Radio选择逻辑，初始化
 * Object  this对象，放于input上
 * String  id_name 对应存数据的input的 ID名
 */
function yth_radio_logic(this_obj, id_name) {
  var it = $(this_obj),
    parent = it.parent();
  this_val = it.attr("yth-id");
  // Radio 动画设置
  parent.find(".layui-form-radioed").removeClass("layui-form-radioed");
  parent.find(".layui-anim-scaleSpring").removeClass("layui-anim-scaleSpring");
  parent.find(".layui-form-radio i").html(''); // 变动前
  it.find("i").html(''); // 变动后
  it.addClass("layui-form-radioed");
  it.find("i").addClass("layui-anim-scaleSpring");
  // 数据设置
  $("#" + id_name).val(this_val);
}