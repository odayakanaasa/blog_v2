<?php
/**
* Editor编辑权限
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
Class Media{

  /**
   * @api {post} /Api?con=Media&act=kugou_music 酷狗音乐接口
   * @apiName kugou_music
   * @apiGroup Media
   *
   * @apiParam {string} fileHash 对应音乐的文件哈希
   *
   * @apiDescription  获取酷狗对应音乐的播放地址
   *
   * @apiVersion 2.0.0
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   * {
   *      "url": ""
   * }
   */
  public function kugou_music(){
    // 对应音乐的fileHash
    $fileHash = '1BA52AFC430A1D0EBF9C7271BD71E6B9';
    $url = 'http://www.kugou.com/yy/index.php?r=play/getdata&hash='.$fileHash;
    $header = [
      "Accept:application/json, text/javascript, */*; q=0.01",
      "Connection:keep-alive",
      "Host:www.kugou.com",
      "Referer:http://www.kugou.com/song/",
      "User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.221 Safari/537.36 SE 2.X MetaSr 1.0",
      "X-Requested-With:XMLHttpRequest"
    ];
    $d = curl_request($url, null, $header);
    $d = json_decode($d, true);
    $msg['url'] = $d['data']['play_url'];
    trans_json($msg);
  }
}

/*


<script>
// 搜索歌曲的文件哈希值，并再请求歌曲地址
var yth_search_music_addr ='',
	yth_get_music_add = function(d){
		//
	},
	yth_search_music = function(d){
		console.log(d);
		var list = d.data.lists,
			file_hash = '';
		for( var i in list ){
			// 找出 曲肖冰唱的歌曲
			if( list[i].FileName.match('曲肖冰') ){
				// 请求接口
				console.log(list[i].FileHash);
			} 
		}
	}
</script>
<script src="http://songsearch.kugou.com/song_search_v2?callback=yth_search_music&keyword=%E5%88%9A%E5%A5%BD%E9%81%87%E8%A7%81%E4%BD%A0&page=1&pagesize=30&userid=-1&clientver=&platform=WebFilter&tag=em&filter=2&iscorrection=1&privilege_filter=0&_=1496976577738"></script>





*/