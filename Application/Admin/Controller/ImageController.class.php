<?php
/**
 * Created for takahashi.
 * Author: Qi
 * Date: 2016.7.21
 *                        . .
 *                      '.-:-.`  
 *                      '  :  `
 *                   .-----:     
 *                 .'       `.
 *           ,    /       (o) \   
 *           \`._/          ,__)
 *       ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *       
 *       Code is far away from bug with the dolphin protecting
 *                       海豚保佑,代码无bug
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class ImageController extends CommonController
{
    private $_uploadObj;
    public function __construct()
    {
    }
    public function ajaxuploadimage()
    {
        $upload = D('UploadImage');
        $res = $upload->imageUpload();
        if ($res === false) {
            return show(0, '上传失败', '');
        } else {
            return show(1, '上传成功', $res);
        }
    }
    public function kindupload()
    {
        $upload = D('UploadImage');
        $res = $upload->upload();
        if ($res === false) {
            return showKind(1, '上传失败');
        } else {
            return showKind(0, $res);
        }
    }

}