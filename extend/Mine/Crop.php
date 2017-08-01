<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//++        截图，后端处理
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// 用法，见文末
namespace Mine;
class Crop{
    // 系统配置
    private $src ; // 上传文件，在服务器上的位置
    private $data; 
    private $file; 
    private $msg ;
    private $type;
    private $extension ;
    private $unlink_src;
    // 系统配置，临时变量
    private $url_dst   ;
    // 初始化配置
    protected $server_root   ;  // 站点根目录
    protected $set_temp_src  ;  // 临时文件存放目录
    protected $pic_name_rand ;  // 随机文件名
    protected $set_url_prefix;  // 文件存储目录
    protected $cdn_status    ;  // Boolean 默认false不开启cdn
    protected $cdn_func_name ;  // 实现的静态函数名,上传到cdn，参数一(相对站点图片绝对路径)
    protected $source_url    ;  // (Array)返回各个截图的url
    public    $url_pre       ;  // 尺寸的前面部分，可直接取出
    public    $cdn_info      ;  // CDN调试信息，可直接取出

    // 此部分需要手动配置
    protected function init(){
        $this->server_root   = ROOT_PATH.'/public';
        $this->set_temp_src  = $this->server_root.'/Uploads/temp/';
        $this->pic_name_rand = md5( microtime() ).'_';
        $this->set_url_prefix= '/Uploads/local/';
        $this->url_pre = $this->set_url_prefix . $this->pic_name_rand;
    }

    // 构造函数，(二维数组)sizes 0=>宽、1=>高, 2->cdn开启按钮[不设置默认关闭]
    public function __construct( $data, $file, $sizes ) {
        $this->init();
        $this->setData($data);
        $this->setFile($file);
        // Run
        for( $i=0; $i<count($sizes);$i++){
            // 将要截图的 宽、高
            $_w =  $sizes[$i][0];
            $_h =  $sizes[$i][1];
            // 图片，存放的绝对路径
            $absolute_src_path = $this->url_pre. $_w .'x' .$_h.  '.jpg';
            // 图片，存放的服务器路径
            $ser_src_path      = $this->server_root . $absolute_src_path;
            // 截图，src_path 存放位置
            $this -> crop($this->src, $ser_src_path, $this->data, $_w, $_h);
            /*~~~~~~~~~~是否存入cdn，【请确保已设置，CDN驱动了】~~~~~~~~~~~*/
            if(  isset( $sizes[$i][2] )  ){
                $this->cdn_info[] = \Mine\Cdn::comeTrue( $absolute_src_path, true)  ;
            }
            $this->source_url[] = $absolute_src_path;
        }
        @unlink( $this->unlink_src );
    }
    // 传过来的文件临时信息，进行去反斜杠，并且进行json编码
    private function setData($data) {
        if (!empty($data)) {
            $this ->data = json_decode(stripslashes($data));
        }
    }
    // 将上传的临时图片，转移到指定地方，将图片提取出来，用于后面进行放缩存储操作。
    private function setFile($file) {
        $errorCode = $file['error'];
        if ($errorCode === UPLOAD_ERR_OK) {
            $type = exif_imagetype($file['tmp_name']);
            $this ->type = $type;
            if ( $this ->type ) {
                $extension = image_type_to_extension($type);
                $this ->extension = $extension;
                // 并发控制，防止出现文件的覆盖
                $src = $this->set_temp_src . $this->pic_name_rand . $this ->extension;
                // 保存指定地址，进行完放缩
                $this->unlink_src = $src;
                if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG) {
                    $result = move_uploaded_file($file['tmp_name'], $src);
                    if ($result) {
                        $this->src = $src;
                        $this->type = $type;
                        $this->extension = $extension;
                    } else {
                        $this->msg = 'Failed to save file';
                    }
                } else {
                    $this->msg = 'Please upload image with the following types: JPG, PNG, GIF';
                }
            } else {
                $this->msg = 'Please upload image file';
            }
        } else {
            $this->msg = $this->codeToMessage($errorCode);
        }
        return $this;
    }
    // 保存剪切的第一张图,   dst:系统的绝对路径
    private function crop($src, $dst, $data, $cut_w, $cut_h) {
        if (!empty($src) && !empty($dst) && !empty($data)) {
            switch ($this->type) {
                case IMAGETYPE_GIF:
                    $src_img = imagecreatefromgif($src);
                break;
                case IMAGETYPE_JPEG:
                    $src_img = imagecreatefromjpeg($src);
                break;
                case IMAGETYPE_PNG:
                    $src_img = imagecreatefrompng($src);
                break;
                default:
                    $src_img = false;
            }
            if (!$src_img) {
                $this->msg = "Failed to read the image file";
                return;
            }
            $size = getimagesize($src);
            $size_w = $size[0]; // natural width
            $size_h = $size[1]; // natural height
            $src_img_w = $size_w;
            $src_img_h = $size_h;
            $degrees = $data->rotate;
            // Rotate the source image
            if (is_numeric($degrees) && $degrees != 0) {
                // PHP's degrees is opposite to CSS's degrees
                //修改背景色为白色rgb(255,255,255)
                $new_img = imagerotate($src_img, -$degrees, imagecolorallocatealpha($src_img, 255, 255, 255, 127));
                imagedestroy($src_img);
                $src_img = $new_img;
                $deg = abs($degrees) % 180;
                $arc = ($deg > 90 ? (180 - $deg) : $deg) * M_PI / 180;
                $src_img_w = $size_w * cos($arc) + $size_h * sin($arc);
                $src_img_h = $size_w * sin($arc) + $size_h * cos($arc);
                // Fix rotated image miss 1px issue when degrees < 0
                $src_img_w-= 1;
                $src_img_h-= 1;
            }
            $tmp_img_w = $data->width;
            $tmp_img_h = $data->height;
            //截图大小
            $dst_img_w = $cut_w;
            $dst_img_h = $cut_h;
            $src_x = $data->x;
            $src_y = $data->y;
            if ($src_x <= - $tmp_img_w || $src_x > $src_img_w) {
                $src_x = $src_w = $dst_x = $dst_w = 0;
            } else if ($src_x <= 0) {
                $dst_x = - $src_x;
                $src_x = 0;
                $src_w = $dst_w = min($src_img_w, $tmp_img_w + $src_x);
            } else if ($src_x <= $src_img_w) {
                $dst_x = 0;
                $src_w = $dst_w = min($tmp_img_w, $src_img_w - $src_x);
            }
            if ($src_w <= 0 || $src_y <= - $tmp_img_h || $src_y > $src_img_h) {
                $src_y = $src_h = $dst_y = $dst_h = 0;
            } else if ($src_y <= 0) {
                $dst_y = - $src_y;
                $src_y = 0;
                $src_h = $dst_h = min($src_img_h, $tmp_img_h + $src_y);
            } else if ($src_y <= $src_img_h) {
                $dst_y = 0;
                $src_h = $dst_h = min($tmp_img_h, $src_img_h - $src_y);
            }
            // Scale to destination position and size
            $ratio = $tmp_img_w / $dst_img_w;
            $dst_x/= $ratio;
            $dst_y/= $ratio;
            $dst_w/= $ratio;
            $dst_h/= $ratio;
            $dst_img = imagecreatetruecolor($dst_img_w, $dst_img_h);
            // Add transparent background to destination image
            //修改背景色为白色rgb(255,255,255)
            imagefill($dst_img, 0, 0, imagecolorallocatealpha($dst_img, 255, 255, 255, 127));
            imagesavealpha($dst_img, true);
            $result = imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
            if ($result) {
                if (!imagejpeg($dst_img, $dst)) {
                    $this->msg = "Failed to save the cropped image file";
                }
            } else {
                $this->msg = "Failed to crop the image file";
            }
            imagedestroy($src_img);
            imagedestroy($dst_img);
        }
    }
    // 反馈，当关于上传的图片过大时，出现的各种出错原因
    private function codeToMessage($code) {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            break;
            case UPLOAD_ERR_PARTIAL:
                $message = 'The uploaded file was only partially uploaded';
            break;
            case UPLOAD_ERR_NO_FILE:
                $message = 'No file was uploaded';
            break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = 'Missing a temporary folder';
            break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = 'Failed to write file to disk';
            break;
            case UPLOAD_ERR_EXTENSION:
                $message = 'File upload stopped by extension';
            break;
            default:
                $message = 'Unknown upload error';
        }
        return $message;
    }
    // 返回所有图片的地址
    public function getResult() {
        return $this ->source_url ;
    }
    // 返回类型
    public function getPicType(){
        return $this->type;
    }
    // 出错时，返回错误信息
    public function getMsg() {
        return $this->msg;
    }

}
/** 用法如下
    public function crop(){
         if ( !isset($_POST['avatar_data']) || !isset( $_FILES['avatar_file'] ) ){
            $msg['out'] = '请先传入参数';
            echo json_encode( $msg );
            exit();
        }
        $crop = new \Mine\Crop( $_POST['avatar_data'], $_FILES['avatar_file'] ,[
          [400,400,true],
          [300,300,true],
          [100,100,true],
          [60,60]
        ]);
        $msg['state']  = 200;
        $msg['message']= $crop->getMsg() ? $crop -> getMsg() : ''; // 报错信息
        $msg['result'] = '/static/plugins/pic_cut/img/err.jpg';
        if( '' == $msg['message'] ){
            $msg['result'] = $crop -> getResult()[0]; // 获取截图的第一张
        }
        echo json_encode( $msg );
    }
*/