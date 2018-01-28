var layer_index ;  // 记录 layer 的索引号

// 列表
function get_link(){
  var page_load_index = layer.load(0, {shade:  [0.1, 'none'] }); // 加载层 开启
  $.ajax({
    "url":api("Admin_basic","friend_link_info"),
    "type":"post",
    "dataType":"json",
    "success":function(msg){
      render("yth_t1","get_friend_link",msg.info,true);
      layer.close(page_load_index);// 加载层 关闭
      // 修改
      modify_link();
    }
  });
}

// 列表 => 修改
function modify_link(){
  $(".act_edit").on("click", function() {
    var id = $(this).attr('yth-data-id'),
        name = $("#yth_title_"+id).html(),
      server = $("#yth_url_"+id).html();
    var tpl=''
    +'<form class="layui-form layui-form-pane" id="form_2">'
    +'  <input type="hidden" yth-title="这里存id" name="id" value="'+id+'">'
    +'  <div class="layui-form-item">'
    +'    <label class="layui-form-label">站点名称</label>'
    +'    <div class="layui-input-block">'
    +'      <input type="text" name="title" value="'+name+'" autocomplete="off" placeholder="如，云天河Blog" class="layui-input"></div>'
    +'  </div>'
    +'  <div class="layui-form-item">'
    +'    <label class="layui-form-label">网址</label>'
    +'    <div class="layui-input-block">'
    +'      <input type="text" name="url" value="'+server+'" autocomplete="off" placeholder="如，http://www.hlzblog.top/" class="layui-input"></div>'
    +'  </div>'
    +'</form>'
    +'<button onclick="modify_sub('+id+')" style="'
    +'font-family:微软雅黑;  font-weight: 700;  color: rgb(84,126,86); '
    +'cursor: pointer; outline: none;  padding: 10px 10px; '
    +'width: 100%; font-size: 17px;  border: none; '
    +'background: rgb(220,250,200);margin-top:5px;" type="button">保存</button>'; 
    //自定页
    layer_index = layer.open({
      type: 1,
      title:false,
      closeBtn: 0, //不显示关闭按钮
      anim: 0,
      area: ['500px', 'auto'],
      shadeClose: true, //开启遮罩关闭
      content: tpl
    });
  });
}
// 提交修改
function modify_sub(now_id){
  $.ajax({
    "url":api("Admin_basic","friend_link_edit"),
    "data":$("#form_2").serialize() ,
    "type":"post",
    "dataType":"json",
    "success":function(msg){
      console.log(msg);
      if(msg.out){
        layer.msg(msg.out,{"time":2000});
      }else if(msg.status){
        layer.msg('修改成功',{"time":2000});
        var title = $("#form_2 input[name='title']").val(),
            url   = $("#form_2 input[name='url']").val();
        $("#yth_title_"+now_id).html( title );
        $("#yth_url_"+now_id).html( url );
        layer.close(layer_index);
      }
    }
  });
}

// 设置新的配置
function add_link() {
  $("#yth_mail_edit_button").on("click", function() {
    var data = $("#form_1").serialize();
    request_api(api("Admin_basic", "friend_link_add"), data);
  });
}

