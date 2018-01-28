<?php
/**
 * Editor编辑权限
 */
namespace app\api;

use Mine\Editor as EditorUploadPic;

class Editor
{

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
    public function pic()
    {
        $up      = new EditorUploadPic();
        $up->ser = ROOT_PATH . '/public';
        // 如果有传入 editor_type 则，默认它为markdown的处理器
        if( isset($_GET['editor_type']) ){
            $up->editor_type = 0;
            $up->file_name = 'editormd-image-file';
        }
        $up->run();
    }
}
