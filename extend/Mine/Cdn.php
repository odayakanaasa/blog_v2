<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 图片转存腾讯CDN     Link: http://www.hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 使用案例，见文末
namespace Mine;
include ROOT_PATH.'/extend/qcloudcos/include.php';
use qcloudcos\Cosapi;     // 引入文件
class Cdn{
    /**
    * 配置项
    * @param String : web_prefix 取回的域名，默认cdn域名[file][官网开启cdn才行]，cos源站[cos]
    * @param String : bucketName 存储容器名
    */
    public  static $web_prefix;
    private static $bucketName;

    public static function init(){
        self::$web_prefix = config("Tencent_COS")["source_url"];
        self::$bucketName = config("Tencent_COS")["bucketName"];
        Cosapi::setRegion(config("Tencent_COS")["setRegion"]);
    }
    /**
    * 文件上传
    * @param  String  path 文件的绝对路径
    * @param  Boolean detail 是否返回详细信息
    * @return Boolean false=>状态 |  true=>Array 详细信息
    */
    public static function comeTrue($path, $detail=false) {
        self::init();
        $ser = ROOT_PATH.'/public';
        //创建文件夹
        $dstFolder = substr( $path, 0, strripos($path,'/') );
        $createFolderRet = Cosapi::createFolder(self::$bucketName, $dstFolder);
        //上传文件
        $srcPath = $ser . $path;// 文件在服务器的哪个位置
        $dstPath = $path;           // 传到CDN对象的哪里
        $bizAttr = "";
        $insertOnly = 0;
        $sliceSize = 3 * 1024 * 1024;
        $uploadRet = Cosapi::upload(self::$bucketName, $srcPath, $dstPath,$bizAttr,$sliceSize, $insertOnly);
        if( $detail ){
            return $uploadRet;
        }else if( $uploadRet['code'] === 0 ){
            return true;
        }else{
            return false;
        }
    }

    /**
    * 删除文件
    * @param  String  url  图片url
    * @param  Boolean detail 是否返回详细信息
    * @return Boolean false=>状态 |  true=>Array 详细信息
    */
    public static function del($url, $detail=false) {
        self::init();
        $ser = ROOT_PATH.'/public';
        $rule = quotemeta( self::$web_prefix );
        // 取出绝对路径
        $path = str_replace( self::$web_prefix, '', $url);
        // 删除本地文件，【本地图片可能已经被删除】
        @unlink( $ser . $path );
        // 删除 Object
        $result = Cosapi::delFile(self::$bucketName, $path);
        if( $detail ){
            return $result;
        }else if( $result['code'] === 0 ){
            return true;
        }else{
            return false;
        }
    }

}

/* 若成功：返回的详细信息，示例：
Array
(
    [code] => 0
    [message] => SUCCESS
    [request_id] => NTkyZTg3NThfNWJiODQzXzI5YzVfNmZhOGE=
    [data] => Array
        (
            [access_url] => http://hlzblog-1252048472.file.myqcloud.com/Uploads/editor/20170531_v5ox4.jpg
            [resource_path] => /1252048472/hlzblog/Uploads/editor/20170531_v5ox4.jpg
            [source_url] => http://hlzblog-1252048472.cossh.myqcloud.com/Uploads/editor/20170531_v5ox4.jpg
            [url] => http://sh.file.myqcloud.com/files/v2/1252048472/hlzblog/Uploads/editor/20170531_v5ox4.jpg
            [vid] => bb8c72d48328967498950084db29173f1496221528
        )

)

*/