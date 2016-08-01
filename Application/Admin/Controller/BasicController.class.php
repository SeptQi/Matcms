<?php
/**
 * @ desc: 基本配置控制器
 * @ project: Takahashi
 * @ Author: Qi
 * @ Date: 2016-07-29 20:55:24
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

class BasicController extends CommonController
{
    public function index()
    {
        $result = D('Basic')->select();
        $this->assign('basic',$result);
        $this->display();
    }
    public function add()
    {
        if ($_POST) {
            if (!$_POST['title']) {
                return show(0, "站点信息不可为空");
            }
            if (!$_POST['keywords']) {
                return show(0, "站点关键词不可为空");
            }
            if (!$_POST['description']) {
                return show(0, "站点描述不可为空");
            }
            $id = D('Basic')->save($_POST);
            return show(1, '配置成功');
        } else {
            return show(0, "未提交数据");
        }
    }

}