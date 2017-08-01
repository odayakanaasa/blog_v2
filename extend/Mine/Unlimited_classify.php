<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++            无限极分类
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 使用案例，见文末
namespace Mine;
use think\Db;
class Unlimited_classify{
	private $temp_data;	//  未排序前的数组
	private $info ;		//  排序后的数组
	private $_config = [ 	// 待扩展
		'table'  =>  'hlz_goods_categroy', // 数据从哪个表来
	];

	/**
	* @param Array: config 合并为新的配置信息
	*/
	public function init( $config=false ){
		if( $config ){
			$this->_config = array_merge( $this->_config , $config);
		}
	}
	/**
	* 析构函数
	* Array : config 各种配置
	*/
	function __construct( $config=null ){
		$this->init( $config ); 
		$this->temp_data = $this->set_data();
		$this->info = $this->get_tree( $this->temp_data );
	}

	/**
	* 获取排序后的数组
	*/
	public function get_data(){
		return $this->info;
	}

	/**
	* @return String：返回样式结果
	*/
	public function get_result(){
		$result="";
		foreach ($this->info as $key) {
			if($key['level']>1){
				for($i=2; $i<$key['level']+1 ;$i++){
					$result .= "&nbsp;&nbsp;";
				}
				$result .= "|---";
			}else{
				$result .= "|--";//输出层级
			}
			$result = $result.$key['title']."<br>";
		}
		return $result;
	}

	/**
	* 从数据库获取数据
	*/
	private function set_data(){
		return Db::query('select * from '.$this->_config['table']);
	}

	/**
	* @param Array : cate 数据库中获取的分类列表的数组
	* @param Int   : fid  父ID
	* @param Int   : level 
	* @return Array: 返回子孙数树
	*/
	private function get_tree($cates , $fid = 0 , $level = 1){
		$result=[];//记录子孙数组
		foreach ($cates as $cate) {
			if($cate['fid'] == $fid){
				$cate['level']=$level;//记录层级
				$result[] = $cate;//入数组
				//递归查询所有相关数组，合并
				$result = array_merge(
					$result,
					$this->get_tree($cates,$cate['id'],$level+1 ) 
				);
			}
		}
		return $result;	
	}
}



/*
行SQL如下
create table If Not Exists `hlz_goods_categroy` (
	id smallint(4) unsigned auto_increment comment '自增字段',
	fid smallint(7) unsigned comment '父ID',
	title varchar(50) not null comment '标题',
	primary key (id)
)Engine=Myisam Charset=utf8;
truncate `hlz_goods_categroy`;   #如果存在表=>清空表作测试
Insert into `hlz_goods_categroy` (id,fid,title)Values(1,0,'食品');
Insert into `hlz_goods_categroy` (id,fid,title)Values(2,1,'饼干');
Insert into `hlz_goods_categroy` (id,fid,title)Values(3,0,'饮料');
Insert into `hlz_goods_categroy` (id,fid,title)Values(4,2,'巧克力饼干');
Insert into `hlz_goods_categroy` (id,fid,title)Values(5,0,'电子产品');
Insert into `hlz_goods_categroy` (id,fid,title)Values(6,5,'手机');
Insert into `hlz_goods_categroy` (id,fid,title)Values(7,3,'可乐');
//用法介绍：
		$ini['table'] = 'hlz_news_categroy';
        $uc = new \Mine\Unlimited_classify($ini);
        echo $uc -> get_result() ;
*/