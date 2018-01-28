<?php
// 输出样式见文末
namespace Mine;

use Mine\Token;

class Editor
{

    // 配置信息
    public $file_name   = 'upfile'; // 上传文件的name字段名
    public $size_limit  = 300; // 图片大小限制，单位KB
    public $ser         = __DIR__; // 入口文件路径
    public $dir         = '/Uploads/editor/'; // 绝对路径的目录
    public $editor_type = 1; // 0 表示 editor,md的json格式，1表示 umeditor 的 json格式

    /**
     * 单个上传
     */
    public function run()
    {
        // 大小限制
        $size = $this->size_limit * 1024;
        if ($_FILES[$this->file_name]['size'] > $size) {
            $error_str = '图片不能大于' . $this->size_limit . 'KB';
            $data      = $this->error($error_str);
            exit(json_encode($data));
        }
        // 类型限制
        switch ($_FILES[$this->file_name]["type"]) {
            case "image/gif":
                $suffix = '.gif';
                break;
            case "image/jpg":
            case "image/jpeg":
            case "image/pjpeg":
                $suffix = '.jpg';
                break;
            case "image/png":
                $suffix = '.png';
                break;
            default:
                $data = $this->error("文件类型错误！");
                exit(json_encode($data));
        }
        // 从临时区，搬到站内
        $path   = $this->dir . date("Ymd") . '_' . Token::rand_str(12) . $suffix; // 根路径
        $t_path = $this->ser . $path; // [相对服务器路径] 临时存放位置
        move_uploaded_file($_FILES[$this->file_name]["tmp_name"], $t_path);
        // 为了方便管理Cdn图片，在数据进入了数据库后，方能正式存入Cdn
        if (\Mine\Cdn::comeTrue($path)) {
            $path = \Mine\Cdn::$web_prefix . $path;
        }
        $data = $this->success($path);
        exit(json_encode($data));
    }

    // 上传成功时，传入图片地址，返回数组信息
    private function success($path)
    {
        $data = []; // 待返回的数据
        switch ($this->editor_type) {
            case 0: // markdown
                $data["success"] = 1; // 0 表示上传失败，1 表示上传成功
                $data["url"]     = $path; // 上传成功时才返回
                break;
            case 1: // 富文本
                $data["state"]    = "SUCCESS";
                $data["url"]      = $path;
                $data["title"]    = "查看图片";
                $data["original"] = "-";
                break;
        }
        return $data;
    }

    // 上传成功时，传入图片地址，返回数组信息
    private function error($info_str)
    {
        $data = []; // 待返回的数据
        switch ($this->editor_type) {
            case 0: // markdown
                $data["success"] = 0;
                $data["message"] = $info_str; // 提示的信息，上传成功或上传失败及错误信息等。
                break;
            case 1: // 富文本
                $data['state']    = "error|" . $info_str;
                $data['title']    = "查看图片";
                $data['original'] = "-";
                break;
        }
        return $data;
    }

}
// 输出格式
//  上传成功，返回地址
//     "http://xxx.com/imgs/abc.png"
//  上传成功，返回格式如下
//     "error|服务器端错误"

//     $up = new \Mine\Editor();
//     $up->ser = ROOT_PATH.'/public';
//     $up->run();
