<?php
// Cli的一个应用
namespace app\logic;
use think\Db;
class cli_sitemap{
    /** 
    * Sitemap 临时数据
    * @param  String : sitemap_tpl 模板
    * @param  String : sitemap_xml 渲染后的数据
    * @param  String : host        站点名
    */
    private $sitemap_tpl;
    private $sitemap_xml;
    private $host;

    // [每天凌晨3点] 生成sitemap.xml
    public function run(){
        $date = date("Y-m-d H:i:s");
    	$this->host = config('now_host');
        $site_path  =  ROOT_PATH. '/public';
    	$this->sitemap_tpl = '
	    	<url>
				<loc>%s</loc>
				<lastmod>'.$date.'</lastmod>
				<changefreq>daily</changefreq>
				<priority>%s</priority>
			</url>
    	';
    	$this->sitemap_xml = '<?xml version="1.0" encoding="UTF-8"  ?>
    	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    	// 首页
    	$this->sitemap_render('/', 1);
        // 大事记
        $this->sitemap_render('/Flexible/memorabilia.html', 0.9);
    	// 关于我
    	$this->sitemap_render('/About', 0.9);
    	// 留言
    	$this->sitemap_render('/Board', 0.9);
        // 法律声明
        $this->sitemap_render('/Info/law.html', 0.9);
        
    	// 文章 List
    	$blog_text = \think\Db::query('
    		Select `id`
    		From `blog_text`
    	');
    	$this->sitemap_list( $blog_text,'/','/Article.html',10 );


    	$this->sitemap_xml .= '</urlset>';
        // XML结束，并生成 XML
        $write_path = $site_path. '/sitemap.xml';
        $this->write($write_path, $this->sitemap_xml);
        $this->sitemap_xml = null;

        // 生成 robots
        $write_path = $site_path. '/robots.txt';
        $text  = 'User-agent: *'.PHP_EOL;
        // $text .= 'Disallow: '.PHP_EOL; // 禁止访问的目录，若违规将负法律责任
        // $text .= 'Sitemap: '.$this->host.'/sitemap.xml';
        $this->write($write_path, $text);
    }

    /**
    * sitemap xml 分页列表页与详情页 [write_sitemap函数的部分逻辑]
    * @param  Array : list        数据列表
    * @param  String: url_list    分页列表页
    * @param  String: url_show    详情页
    * @param  Int   : _size       列表页，分页偏移量
    * @param  String: field       接收字段
    */
    private function sitemap_list($list, $url_list, $url_show, $_size, $field='id'){
    	$count_page = ceil( count($list)/$_size );
        $this->sitemap_render($url_list,'0.9');
            // 分页列表页面
    	for($i=1;  $i<=$count_page  ;$i++){
    		$url = $url_list.'?to_page='.$i;
            $this->sitemap_render($url,'0.9');
    	}
    		// 资讯详情页面
    	foreach ($list as $k => $v) {
    		$url = $url_show. '?' .$field. '=' .$v['id'];
            $this->sitemap_render($url,'0.8');
    	}
    }

    /**
    * sitemap xml 分页列表页与详情页 [write_sitemap函数的部分逻辑]
    * @param  String : absolute_url 网站绝对路径
    * @param  String : priority     链接的优先级 [一级目录1 、二级0.9 、 三级0.8]
    */
    private function sitemap_render($absolute_url,$priority=0.8){
        $url =$this->host .$absolute_url;
        $this->sitemap_xml.= sprintf($this->sitemap_tpl,  $url, $priority);
    }

    /**
    * 覆盖写入文件
    * @param  String : set_path 绝对路径
    * @param  String : text     写入内容
    */
    private function write($set_path, $text){
        $fp = fopen($set_path,'w');
        fwrite($fp, $text);
        fclose($fp);
    }
}