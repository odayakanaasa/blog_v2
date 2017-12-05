<?php
/**
* Editor编辑权限
*/
namespace app\api;
use think\Request;
use think\Db;
use Mine\Filter;
use Mine\Editor;
Class Editor{

	/**
   * @api {post} /Api?con=Editor&act=pic 图片上传
   * @apiName pic
   * @apiGroup Editor
   *
   * @apiParam {file} upfile 上传的文件[图片]的name字段
   *
   * @apiDescription  单张图片上传
   *
   * @apiVersion 2.0.0
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   * {
   *   "state"    : "",
   *   "url"      : "",
   *   "title"    : "",
   *   "original" : ""
   * }
   */
  public function pic(){
    $up = new Editor();
  	$up->ser = ROOT_PATH.'/public';
  	$up->run();
  }
}