<?php  // 这里是CURD模板

	/**
	* [添加] 
	* @param POST  : 
	*/
	public function _add(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p[''],	// 
		]);
		Db::table('')->insert($p);
		if_modify(1);
	}

	/**
	* [查看] 一次查看所有
	* @param Get
	*/
	public function _info(){
		$_res = Db::table('')->select();
		trans_json($_res);
	}

	/**
	* [修改] 
	* @param POST  : id,
	*/
	public function _edit(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p[''],		// 主键
			$p['']
		]);
		Db::table('')->update($p);
		if_modify(1);
	}

	/**
	* [删除]
	* @param POST  : id
	*/
	public function _del(){
		$p = Request::instance()->post();
		@Filter::is_set([
			$p['id'],		// 主键
		]);
		Db::table('')->delete($p['id']);
		if_modify(1);
	}
