##API特色

####统一入口[高内聚]

让走向接口的数据，进行更多操作

####功能化模块[低耦合]
形如，

	Admin_common.php
	Slide_Verify.php
	....

####统一输出格式 [Json-String]

一般输出情况

	 - status (Boolean) 是否修改[删除、修改、增加]成功，
	 - out (String) 用户的输入，导致的错误，并返回给用户看
	 - Err (Int) 错误操作，输出错误码[除代码2000]
	 - info (String)数据列表
	 - url (String) 跳转地址 | 上传后图片绝对路径或者cdn路径

####调试台特色

API 模拟调试

统一系统内部错误号，减小输出数据量

错误号，可快速调试出对应输出含义

####数据过滤

<font color="red">前台数据 ：</font>字符串过滤 & 对应接口所需参数存在性验证 & 正则过滤 & 整型过滤

<font color="red">后台数据 ：</font>字符串过滤 & 对应接口所需参数存在性验证 & 正则过滤

####令牌桶 [流量控制]

自动封杀，可能为爬虫[访问接口频率过快]的IP

## 低冗余

####单模块，常用数据，模板化处理
示例——多次且常用的sql[如果改的地方少，则用存储过程]、联合查询、分页：

<font color="red">值得注意的是 %s 的地方必须是字符串，如果是整型，得变成字符串</font>

	private $join_sql = '
		Select a.id, a.user_reason as u_reason, %s
			c.id as uid, c.name as u_name, c.pic as u_pic,
			d.id as attr_id ,d.name as attr_name,
			e.id as gid, e.pic as g_pic, e.name as g_name
		From `hlz_service_logs` as a
		Right Join `hlz_pay_logs` as b
		On b.id = a.pay_logs_id
		Right Join `hlz_user` as c
		On c.id = b.uid
		Right Join `hlz_attr` as d
		On d.id = b.attr_id
		Right Join `hlz_goods` as e
		On e.id = d.gid
		Where %s
		Order By a.id Desc
		Limit ?,?
	';

类中示例：

		/**
		* 分页，查看
		* @param POST  : type,page_now
		* @echo String : 列表[请求号、请求原因、请求时间、用户id、用户]
		*/
		public function get_service(){
			node_check();
			$post_data = Request::instance()->post();
			@Filter::is_set([
				$post_data['type'],
				$post_data['to_page']
			]);
			// 分页配置
			$type     = $post_data['type']   ;	// @post: 1=>换货,2=>退货
			$page_now = $post_data['to_page'];	// @post: 
			$page_size = 15;
			$start_len = ($page_now - 1) * $page_size ;
			// 分页查询
			$now_sql = sprintf( $this->join_sql, '',  'a.type=? And a.status=2'  );
			$result['info'] = Db::query( $now_sql ,[ $type, $start_len, $page_size ] );
			trans_json( $result );
		}
