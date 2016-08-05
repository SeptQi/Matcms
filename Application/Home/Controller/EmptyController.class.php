<?php
/**
 * @ desc: 空操作，空方法
 * @ project: Takahashi
 * @ Author: Qi
 * @ Date: 2016-07-26 14:14:17
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
namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller
{
    public function _empty(){
        //header.html需要数据
        $navs = D('Menu')->getBarMenus();
        $config = D('Basic')->select();
        $catId = $_GET['id'] ? $_GET['id'] : 0;
        //$this->display();
        $this->assign(array(
            'navs'    => $navs,
            'config'  => $config,
            'catId'   => $catId,
            ));
        $this->show();
    }
}