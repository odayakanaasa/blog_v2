//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//+  jQuery分页插件,分页样式,内置 css,请勿使用pager类名
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
/** 示例：
$(function(){
	$("#用于渲染的DIV的id").cypager({
	//pg_cur_count: 1,			//当前页数（如果需要默认显示指定页面，则设置）
	pgerId        : "",			// 插件的ID 默认 : cy_pager
	pg_size       : 10,			// 每页显示记录数 默认：10条
	pg_nav_count  : 10,			//显示多少个导航数  默认：7个
	pg_total_count: 194,		// 总记录数
	pg_prev_name  : "<",		//上一页按钮名称（默认：PREV）
	pg_next_name  : ">",		//下一页按钮名称 (默认：NEXT)
	pg_call_fun   : function(count){
			console.log("Page_now:"+count+" callback!"); // 回调函数，点击按钮执行
		}
	});
});
*/
(function($){var give_css=document.createElement("style");give_css.innerHTML=".pager{padding:0;margin:0;white-space:nowrap}.pager li{list-style:none;font-family:arial;font-size:14px;padding:2px;margin:5px;border:#333 1px solid;text-align:center;border-radius:5px;max-width:80px;width:25px;height:22px;line-height:22px;cursor:pointer;background:#fff;display:inline-block}.pager li:hover{border:#4876ff 1px solid;color:#4876ff}.pager li.pg-hidepage{display:none}.pager li.pg-prev,li.pg-next{width:80px}.pager li.pg-selected{border:#4876ff 1px solid;background:deepskyblue;color:white}.pager li.pg-selected:hover{color:#000;cursor:default}.pager li.pg-dislabel{color:#ccc;border:#ccc 1px solid;cursor:default}.pager li.pg-dislabel:hover{border:#ccc 1px solid}";document.body.appendChild(give_css);$.fn.cypager=function(options){var defaults={id:"cy_pager",pg_size:10,pg_total_count:0,pg_cur_count:1,pg_nav_count:7,pg_prev_name:"PREV",pg_next_name:"NEXT",pg_call_fun:$.noop};var options=$.extend(defaults,options);var pager={};$this=$(this);pager.pagerId=options["id"];pager.pgSize=options["pg_size"];pager.pgCurCount=options["pg_cur_count"];pager.pgTotalCount=options["pg_total_count"];pager.pgNavCount=options["pg_nav_count"];pager.pgPrevName=options["pg_prev_name"];pager.pgNextName=options["pg_next_name"];pager.pgCallFun=options.pg_call_fun;pager.pgCount=parseInt(pager.pgTotalCount/pager.pgSize);if(pager.pgTotalCount%pager.pgSize>0){pager.pgCount++}if(pager.pgCount==0){pager.pgCount=1}var html=genHtml(pager);$this.html(html);renderedPageBtn(pager,$this);$this.find("li").click(function(){var $id=$(this).attr("id");var $page=$(this).attr("page");if("prev"==$id){$page=parseInt(pager.pgCurCount)>1?parseInt(pager.pgCurCount)-1:parseInt(pager.pgCurCount);pager.pgCurCount=$page;renderedPageBtn(pager,$this);options.pg_call_fun($page)}else{if("next"==$id){$page=parseInt(pager.pgCurCount)<parseInt(pager.pgCount)?parseInt(pager.pgCurCount)+1:parseInt(pager.pgCurCount);pager.pgCurCount=$page;renderedPageBtn(pager,$this);options.pg_call_fun($page)}else{if(options.pg_call_fun){$page=$(this).attr("page");pager.pgCurCount=$page;renderedPageBtn(pager,$this);options.pg_call_fun($page)}}}})};function genHtml(pager){var html="<ul class='pager' id='"+pager.pagerId+"'>";html+="<li class='pg-prev' id='prev'>"+pager.pgPrevName+"</li>";for(var i=0;i<pager.pgCount;i++){var page=(i+1);if(i<pager.pgNavCount){html+="<li page='"+page+"' class='pg-showpage'>"+page+"</li>"}else{html+="<li page='"+page+"' class='pg-hidepage'>"+page+"</li>"}}html+="<li class='pg-next' id='next'>"+pager.pgNextName+"</li>";html+="</ul>";return html}function renderedPageBtn(pager,obj){if(pager.pgCurCount==1){obj.find("#prev").addClass("pg-dislabel")}else{obj.find("#prev").removeClass("pg-dislabel")}var lrNode=parseInt(pager.pgNavCount/2);var leftNode=(parseInt(pager.pgCurCount)>lrNode)?parseInt(pager.pgCurCount)-lrNode+1:1;var rightNode=(parseInt(pager.pgCurCount)>lrNode)?parseInt(pager.pgCurCount)+lrNode+1:parseInt(pager.pgNavCount);if(parseInt(pager.pgCurCount)<=lrNode){leftNode=1;rightNode=parseInt(pager.pgNavCount)+1}if((parseInt(pager.pgCurCount)+lrNode)>parseInt(pager.pgCount)){leftNode=parseInt(pager.pgCount)-parseInt(pager.pgNavCount)+1;rightNode=parseInt(pager.pgCount)+1}obj.find("li").removeClass("pg-showpage").removeClass("pg-selected").addClass("pg-hidepage");obj.find("#prev").removeClass("pg-hidepage");obj.find("#next").removeClass("pg-hidepage");for(var i=leftNode;i<rightNode;i++){if(i==pager.pgCurCount){obj.find("li[page='"+i+"']").removeClass("pg-hidepage").addClass("pg-showpage").addClass("pg-selected")}else{obj.find("li[page='"+i+"']").removeClass("pg-hidepage").addClass("pg-showpage")}}if(pager.pgCurCount==pager.pgCount){obj.find("#next").addClass("pg-dislabel")}else{obj.find("#next").removeClass("pg-dislabel")}}})(jQuery);